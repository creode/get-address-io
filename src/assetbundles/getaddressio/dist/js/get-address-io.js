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
$('[name="address-lookup"]').select2({
    ajax: {
        url: '/actions/get-address-io/ajax-lookup/autocomplete',
        dataType: 'json',
        data: function (params) {
            var query = {
                term: params.term,
            }

            // Query parameters will be ?term=[term]
            return query;
        },
        processResults: function (data) {
            var results = [];
            if (!data) {
                return {
                    results: results
                };
            }

            if (data.response.hasErrors) {
                return {
                    results: results
                };
            }

            if (data.response && data.response.suggestions.length > 0) {

                for (var i = 0; i < data.response.suggestions.length; i++) {
                    var suggestion = data.response.suggestions[i];
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
        }
    }
});

$('[name="address-lookup"]').on('select2:select', function (e) {
    // var data = e.params.data;
    // var id = data.id;
    // $.get('https://api.getaddress.io/get/', {'id':id}, function (address, status)
    // {
    //     jQuery(document).trigger('get-address-io-lookup', address);
    // });
});

jQuery(document).on('select2:open', () => {
    document.querySelector('.select2-container--open .select2-search__field').focus();
});