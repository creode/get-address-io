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

use creode\getaddressio\contracts\services\ApiFactory;

/**
 * @author    Creode <contact@creode.co.uk>
 * @package   GetAddressIo
 * @since     1.0.0
 */
class GuzzleClientFactoryService extends ApiFactory
{
    // Public Methods
    // =========================================================================

    public function getAddressesByPostcode(string $postcode): object
    {
        return $this->callAddressAPI("find/$postcode", ['expand' => 'True']);
    }

    /**
     * @inheritdoc
     */
    public function autocomplete(string $searchTerm): object
    {
        return $this->callAddressAPI("autocomplete/$searchTerm");
    }

    /**
     * @inheritdoc
     */
    public function getAddressById(string $id): object
    {
        return $this->callAddressAPI("/get/$id");
    }

    // Protected Methods
    // =========================================================================
}
