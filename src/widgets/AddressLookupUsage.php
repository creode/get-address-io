<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion of address' in the UK.
 *
 * @link      https://creode.co.uk
 * @copyright Copyright (c) 2021 Creode <contact@creode.co.uk>
 */

namespace creode\getaddressio\widgets;

use creode\getaddressio\GetAddressIo;
use creode\getaddressio\assetbundles\addresslookupusagewidget\AddressLookupUsageWidgetAsset;

use Craft;
use craft\base\Widget;

/**
 * Get Address IO Widget
 *
 * @author    Creode <contact@creode.co.uk>
 * @package   GetAddressIo
 * @since     1.0.0
 */
class AddressLookupUsage extends Widget
{

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $message = 'Hello, world.';

    // Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('get-address-io', 'AddressLookupUsage');
    }

    /**
     * @inheritdoc
     */
    public static function iconPath()
    {
        return Craft::getAlias("@creode/getaddressio/assetbundles/addresslookupusagewidget/dist/img/AddressLookupUsage-icon.svg");
    }

    /**
     * @inheritdoc
     */
    public static function maxColspan()
    {
        return null;
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge(
            $rules,
            [
                ['message', 'string'],
                ['message', 'default', 'value' => 'Hello, world.'],
            ]
        );
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        return Craft::$app->getView()->renderTemplate(
            'get-address-io/_components/widgets/AddressLookupUsage_settings',
            [
                'widget' => $this
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function getBodyHtml()
    {
        Craft::$app->getView()->registerAssetBundle(AddressLookupUsageWidgetAsset::class);

        return Craft::$app->getView()->renderTemplate(
            'get-address-io/_components/widgets/AddressLookupUsage_body',
            [
                'message' => $this->message
            ]
        );
    }
}
