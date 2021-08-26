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
class GetAddressLookupService extends Component
{
    // Public Methods
    // =========================================================================

    /*
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';
        // Check our Plugin's settings for `someAttribute`
        if (GetAddressIo::$plugin->getSettings()->someAttribute) {
        }

        return $result;
    }
}
