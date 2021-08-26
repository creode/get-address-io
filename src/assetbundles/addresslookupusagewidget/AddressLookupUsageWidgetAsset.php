<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion address' using UK Postcoes
 *
 * @link      https://creode.co.uk
 * @copyright Copyright (c) 2021 Creode <contact@creode.co.uk>
 */

namespace creode\getaddressio\assetbundles\addresslookupusagewidget;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Creode <contact@creode.co.uk>
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
        $this->sourcePath = "@creode/getaddressio/assetbundles/addresslookupusagewidget/dist";

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
