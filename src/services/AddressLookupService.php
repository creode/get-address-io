<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion address' using UK Postcoes
 *
 * @link      https://creode.co.uk
 * @copyright Copyright (c) 2021 Creode <contact@creode.co.uk>
 */

namespace creode\getaddressio\services;

use creode\getaddressio\GetAddressIo;

use Craft;
use craft\base\Component;

/**
 * @author    Creode <contact@creode.co.uk>
 * @package   GetAddressIo
 * @since     1.0.0
 */
class AddressLookupService extends Component
{
    // Public Methods
    // =========================================================================

    /*
     * @return mixed
     */
    public function autocomplete(string $searchTerm)
    {
        if (empty(GetAddressIo::$plugin->getSettings()->getAPIKey())) {
            // Throw an error.
            throw new \Exception('getaddress.io API Key not set. Please add this to plugins configuration screen.');
        }

        return GetAddressIo::$plugin
            ->guzzleClientFactoryService
            ->autocomplete($searchTerm);
    }
}
