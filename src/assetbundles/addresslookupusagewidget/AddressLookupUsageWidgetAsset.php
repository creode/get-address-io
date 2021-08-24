<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion address' using UK Postcoes
 *
 * @link      https://jaymeh.co.uk
 * @copyright Copyright (c) 2021 Jamie Sykes <contact@jaymeh.co.uk>
 */

namespace jaymeh\getaddressio\assetbundles\addresslookupusagewidget;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Jamie Sykes <contact@jaymeh.co.uk>
 * @package   GetAddressIo
 * @since     1.0.0
 */
class AddressLookupUsageWidgetAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@jaymeh/getaddressio/assetbundles/addresslookupusagewidget/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/AddressLookupUsage.js',
        ];

        $this->css = [
            'css/AddressLookupUsage.css',
        ];

        parent::init();
    }
}
