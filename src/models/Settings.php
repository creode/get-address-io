<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion of address' in the UK.
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
     * Get Address IO API Key used to make API calls.
     * 
     * @var string
     */
    public $apiKey = '';

    /**
     * Get Address IO Admin Key used for Admin based tasks.
     *
     * @var string
     */
    public $administrationKey = '';

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

    public function getAdministrationKey()
    {
        return Craft::parseEnv($this->administrationKey);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['apiKey', 'string'],
            ['administrationKey', 'string']
        ];
    }
}
