/**
 * Get Address IO plugin for Craft CMS
 *
 * Get Address IO JS
 *
 * @author    Creode
 * @copyright Copyright (c) 2021 Creode <contact@creode.co.uk>
 * @link      https://creode.co.uk
 * @package   GetAddressIo
 * @since     1.0.0
 */
var getAddressIoAutocomplete = {
    elements: {
        lookupSelectField: false
    },

    init: function() {
        if (!this.getElements()) {
            return;
        }

        this.registerSelectListener();
        this.focusSelectAutocompleteOnOpen();
        this.triggerAddressPopulateEvent();
    },

    getElements: function() {
        this.elements.lookupSelectField = jQuery('select[name="address-lookup"]');
        if (!this.elements.lookupSelectField.length) {
            return false;
        }

        return true;
    },

    registerSelectListener: function() {
        var self = this;

        this.elements.lookupSelectField.select2({
            ajax: {
                url: '/actions/get-address-io/ajax-lookup/autocomplete',
                dataType: 'json',
                type: "POST",
                data: function (params) {
                    var requestData = {
                        'term': params.term
                    };
                    requestData[csrfToken.csrfTokenName] = csrfToken.csrfTokenValue;
                    return requestData;
                },
                processResults: function(lookupAddressData) {
                    return self.formatAddressResultsForSelect2(lookupAddressData);
                }
            }
        });
    },

    formatAddressResultsForSelect2: function(lookupAddressData) {
        var results = [];
        if (!lookupAddressData || !lookupAddressData.response) {
            return {
                results: results
            };
        }

        if (lookupAddressData.response.hasErrors) {
            return {
                results: results
            };
        }

        if (lookupAddressData.response.suggestions.length <= 0) {
            return {
                results: results
            };
        }

        for (var i = 0; i < lookupAddressData.response.suggestions.length; i++) {
            var suggestion = lookupAddressData.response.suggestions[i];
            results.push({
                id:suggestion.id,
                text:suggestion.address
            });
        }

        return {
            results: results
        };
    },

    focusSelectAutocompleteOnOpen: function() {
        jQuery(document).on('select2:open', () => {
            jQuery('.select2-container--open .select2-search__field').get(0).focus();
        });
    },

    triggerAddressPopulateEvent: function() {
        this.elements.lookupSelectField.on('select2:select', function (e) {
            var postData = {
                'id': e.params.data.id
            };
            postData[csrfToken.csrfTokenName] = csrfToken.csrfTokenValue;
            jQuery.post('/actions/get-address-io/ajax-lookup/get-by-id', postData, function (address, status)
            {
                if (!address.response || address.response.hasErrors) {
                    throw Error('Could not obtain address.');
                }

                document.dispatchEvent(new CustomEvent('get-address-io-autocomplete', { 'detail': address.response }));
            });
        });
    }
}

jQuery(document).ready(function() {
    getAddressIoAutocomplete.init();
});
