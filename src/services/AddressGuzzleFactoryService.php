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
use GuzzleHttp\Client as GuzzleClient;

/**
 * @author    Creode <contact@creode.co.uk>
 * @package   GetAddressIo
 * @since     1.0.0
 */
class AddressGuzzleFactoryService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * Builds a predefined guzzle client with the correct options.
     *
     * @return GuzzleClient
     */
    public function getClient()
    {
        return new GuzzleClient(
            [
                'base_uri' => 'https://api.getAddress.io/',
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]
        );
    }
}
