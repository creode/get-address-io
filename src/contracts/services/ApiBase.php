<?php

namespace creode\getaddressio\contracts\services;

use craft\base\Component;

abstract class ApiBase extends Component
{
    const BASE_ADDRESS_API_URL = 'https://api.getAddress.io/';

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
    public function autocomplete(string $searchTerm): object
    {
        return $this->get("autocomplete/$searchTerm");
    }

    /**
     * Gets an Address from the API with the provided ID.
     *
     * @param string $id
     * @return object
     */
    public function getAddressById(string $id): object
    {
        return $this->get("/get/$id");
    }

    /**
     * Gets all address' associated to a provided postcode.
     *
     * @param string $postcode
     * @return object
     */
    public function getAddressesByPostcode(string $postcode): object
    {
        return $this->get("find/$postcode", ['expand' => 'True']);
    }

    /**
     * Accepts a url parameter and pushes a GET request to the API with the given url.
     *
     * @param string $url The url to call.
     * @param array $parameters Any query parameters provided.
     * @return object
     */
    abstract protected function get($url, $parameters = []);
}
