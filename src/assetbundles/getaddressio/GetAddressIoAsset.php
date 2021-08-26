<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion address' using UK Postcoes
 *
 * @link      https://creode.co.uk
 * @copyright Copyright (c) 2021 Creode <contact@creode.co.uk>
 */

namespace creode\getaddressio\assetbundles\getaddressio;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Creode <contact@creode.co.uk>
 * @package   GetAddressIo
 * @since     1.0.0
 */
class GetAddressIoAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@creode/getaddressio/assetbundles/getaddressio/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/GetAddressIo.js',
        ];

        $this->css = [
            'css/GetAddressIo.css',
        ];

        parent::init();
    }
}
