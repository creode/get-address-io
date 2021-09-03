<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion of address' in the UK.
 *
 * @link      https://creode.co.uk
 * @copyright Copyright (c) 2021 Creode <contact@creode.co.uk>
 */

namespace creode\getaddressio\services;

use Craft;

use craft\base\Component;
use creode\getaddressio\GetAddressIo;
use creode\getaddressio\contracts\ApiResponse;

/**
 * @author    Creode <contact@creode.co.uk>
 * @package   GetAddressIo
 * @since     1.0.0
 */
class AddressLookupService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * Searches the Get Address IO API for addresses within a given postcode.
     *
     * @param string $postcode
     *
     * @return ApiResponse
     */
    public function getAddressesByPostcode(string $postcode)
    {
        return GetAddressIo::$plugin
            ->api
            ->getAddressesByPostcode($postcode);
    }

    /**
     * Handles the Get Address IO Autocomplete functionality.
     *
     * @param string|null $searchTerm The search term we will provide to Get Address' API.
     *
     * @return ApiResponse
     */
    public function autocomplete(?string $searchTerm)
    {
        if (! $searchTerm) {
            return;
        }

        return GetAddressIo::$plugin
            ->api
            ->autocomplete($searchTerm);
    }

    /**
     * Finds an address by a given ID.
     *
     * @param string $id
     * @return ApiResponse
     */
    public function getAddressById(string $id)
    {
        return GetAddressIo::$plugin
            ->api
            ->getAddressById($id);
    }

    /**
     * Gets a report based on the API Usage.
     *
     * @return ApiResponse
     */
    public function getApiUsage()
    {
        return GetAddressIo::$plugin
            ->api
            ->getAPIUsage();
    }
}
