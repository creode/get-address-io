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
var getAddressLookup = {
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
                data: function (params) {
                    return {
                        term: params.term,
                    };
                },
                processResults: function(lookupAddressData) {
                    return self.formatAddressResults(lookupAddressData);
                }
            }
        });
    },

    formatAddressResults: function(lookupAddressData) {
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

        if (lookupAddressData.response.suggestions.length > 0) {
            for (var i = 0; i < lookupAddressData.response.suggestions.length; i++) {
                var suggestion = lookupAddressData.response.suggestions[i];
                var result = {
                    id:suggestion.id,
                    text:suggestion.address
                }
                results.push(result);
            }
        }

        return {
            results: results
        };
    },

    focusSelectAutocompleteOnOpen: function() {
        jQuery(document).on('select2:open', () => {
            document.querySelector('.select2-container--open .select2-search__field').focus();
        });
    },

    triggerAddressPopulateEvent: function() {
        jQuery(this.elements.lookupSelectField).on('select2:select', function (e) {
            // var data = e.params.data;
            // var id = data.id;
            // jQuery.get('https://api.getaddress.io/get/', {'id':id}, function (address, status)
            // {
            //     jQuery(document).trigger('get-address-io-lookup', address);
            // });
        });
    }
}

jQuery(document).ready(function() {
    getAddressLookup.init();
});
