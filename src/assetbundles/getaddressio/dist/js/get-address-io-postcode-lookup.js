var getAddressIoPostcodeLookup = {
    elements: {
        lookupField: false,
        lookupButton: false,
    },

    init: function() {
        if (!this.getElements()) {
            return;
        }

        this.registerEvents();
    },

    getElements: function() {
        this.elements.lookupField = jQuery('.postcode-lookup-field input');
        if (!this.elements.lookupField.length) {
            return false;
        }

        this.elements.lookupButton = jQuery('.get-address-io-postcode-lookup-btn');
        if (!this.elements.lookupButton.length) {
            return false;
        }

        return true;
    },

    registerEvents: function() {
        this.elements.lookupButton.click(function(e) {
            e.preventDefault();

            var postcodeLookupWrapper = jQuery(this).closest('.get-address-io-postcode-lookup-wrapper');
            var postcodeField = postcodeLookupWrapper.find('input');

            if (postcodeField.length <= 0) {
                return;
            }

            var postData = {
                'postcode': postcodeField.val(),
            };
            postData[csrfToken.csrfTokenName] = csrfToken.csrfTokenValue;

            // Send postcode off to ajax.
            jQuery.post('/actions/get-address-io/ajax-lookup/get-by-postcode', postData, function(addresses, status) {
                if (!addresses.response || addresses.response.hasErrors) {
                    throw Error('Could not obtain addresses.');
                }

                // Set address select box ready to be sent through to the listening event.
                var addressSelectBox = postcodeLookupWrapper.find('select');

                // Trigger an event that can be listened to in your theme, passing list of addresses and element.
                document.dispatchEvent(new CustomEvent('get-address-io-postcode-lookup', {'detail': {
                    addresses: addresses.response,
                    selectBox: addressSelectBox
                }}));
            });
        })
    },
}

jQuery(document).ready(function() {
    getAddressIoPostcodeLookup.init();
});
