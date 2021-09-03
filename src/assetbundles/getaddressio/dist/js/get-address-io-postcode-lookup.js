var getAddressIoPostcodeLookup = {
    elements: {
        lookupField: false,
        lookupButton: false,
    },

    init: function() {
        if (!this.getElements()) {
            return;
        }


    },

    getElements: function() {
        this.elements.lookupField = jQuery('select[name="postcode-lookup"]');
        if (!this.elements.lookupField.length) {
            return false;
        }

        this.elements.lookupButton = jQuery('');

        return true;
    },
}

jQuery(document).ready(function() {
    getAddressIoPostcodeLookup.init();
});
