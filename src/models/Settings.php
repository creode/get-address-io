<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion address' using UK Postcoes
 *
 * @link      https://creode.co.uk
 * @copyright Copyright (c) 2021 Creode <contact@creode.co.uk>
 */

namespace creode\getaddressio\models;

use creode\getaddressio\GetAddressIo;

use Craft;
use craft\base\Model;

/**
 * @author    Creode <contact@creode.co.uk>
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
    public $apiKey = '';

    // Public Methods
    // =========================================================================

    /**
     * Gets the API Key out of the environment variable.
     *
     * @return void
     */
    public function getAPIKey()
    {
        return Craft::parseEnv($this->apiKey);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['apiKey', 'string'],
        ];
    }
}
