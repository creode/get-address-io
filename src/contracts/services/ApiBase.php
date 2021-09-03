<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion of address' in the UK.
 *
 * @link      https://creode.co.uk
 * @copyright Copyright (c) 2021 Creode <contact@creode.co.uk>
 */

namespace creode\getaddressio\contracts\services;

use craft\base\Component;
use creode\getaddressio\contracts\ApiResponse;
use creode\getaddressio\GetAddressIo;

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
     * @return ApiResponse
     */
    public function autocomplete(string $searchTerm): ApiResponse
    {
        return $this->get("autocomplete/$searchTerm");
    }

    /**
     * Gets an Address from the API with the provided ID.
     *
     * @param string $id
     * @return ApiResponse
     */
    public function getAddressById(string $id): ApiResponse
    {
        return $this->get("/get/$id");
    }

    /**
     * Gets all address' associated to a provided postcode.
     *
     * @param string $postcode
     * @return ApiResponse
     */
    public function getAddressesByPostcode(string $postcode): ApiResponse
    {
        return $this->get("find/$postcode", ['expand' => 'True']);
    }

    /**
     * Get a basic usage report back from the API.
     *
     * @return ApiResponse
     */
    public function getAPIUsage(): ApiResponse
    {
        return $this->get("v3/usage", ['api-key' => GetAddressIo::$plugin->getSettings()->getAdministrationKey()]);
    }

    /**
     * Accepts a url parameter and pushes a GET request to the API with the given url.
     *
     * @param string $url The url to call.
     * @param array $parameters Any query parameters provided.
     * @return ApiResponse
     */
    abstract protected function get($url, $parameters = []): ApiResponse;
}
