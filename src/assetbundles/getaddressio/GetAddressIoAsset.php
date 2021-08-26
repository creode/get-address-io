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
use hiqdev\yii2\assets\select2\Select2Asset;
use yii\web\JqueryAsset;

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
            AssetBundle::class,
            JqueryAsset::class,
            Select2Asset::class,
        ];

        $this->js = [
            'js/get-address-io.js',
        ];

        $this->css = [
            'css/get-address-io.css',
        ];

        parent::init();
    }
}
