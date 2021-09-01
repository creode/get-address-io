<?php

namespace creode\getaddressio\contracts\services;

use craft\base\Component;

abstract class ApiFactory extends Component
{
    protected $errorMessages = [
        400 => 'Invalid postcode data provided.',
        401 => 'Invalid API Key Configured.',
        403 => 'Invalid Permissions configured',
        404 => 'Postcode not found.',
        429 => 'Lookup Rate Limit Hit.',
        500 => 'Postcode Service is down',
    ];

    /**
     * Main function which is used to make a request to Get Address' autocomplete
     * function.
     *
     * @param string $searchTerm
     * @return object
     */
    abstract public function autocomplete(string $searchTerm): object;

    /**
     * Gets an Address from the API with the provided ID.
     *
     * @param string $id
     * @return object
     */
    abstract public function getAddressById(string $id): object;

    /**
     * Gets all address' associated to a provided postcode.
     *
     * @param string $postcode
     * @return object
     */
    abstract public function getAddressesByPostcode(string $postcode): object;
}
