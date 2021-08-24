<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion address' using UK Postcoes
 *
 * @link      https://jaymeh.co.uk
 * @copyright Copyright (c) 2021 Jamie Sykes <contact@jaymeh.co.uk>
 */

namespace jaymeh\getaddressio\models;

use jaymeh\getaddressio\GetAddressIo;

use Craft;
use craft\base\Model;

/**
 * @author    Jamie Sykes <contact@jaymeh.co.uk>
 * @package   GetAddressIo
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $someAttribute = 'Some Default';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['someAttribute', 'string'],
            ['someAttribute', 'default', 'value' => 'Some Default'],
        ];
    }
}
