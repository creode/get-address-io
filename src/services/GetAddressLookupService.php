<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion address' using UK Postcoes
 *
 * @link      https://jaymeh.co.uk
 * @copyright Copyright (c) 2021 Jamie Sykes <contact@jaymeh.co.uk>
 */

namespace jaymeh\getaddressio\services;

use jaymeh\getaddressio\GetAddressIo;

use Craft;
use craft\base\Component;

/**
 * @author    Jamie Sykes <contact@jaymeh.co.uk>
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
