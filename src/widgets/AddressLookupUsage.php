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

    public $billing_report = 'list';

    // Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('get-address-io', 'getaddress.io API Usage');
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
                ['billing_report', 'string'],
                ['billing_report', 'default', 'value' => 'list']
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
                'widget' => $this,
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function getBodyHtml()
    {
        Craft::$app->getView()->registerAssetBundle(AddressLookupUsageWidgetAsset::class);
        $apiUsage = GetAddressIo::$plugin->addressLookupService->getApiUsage();

        return Craft::$app->getView()->renderTemplate(
            'get-address-io/_components/widgets/AddressLookupUsage_body',
            [
                'billing_report' => $this->billing_report,
                'usage' => $apiUsage,
            ]
        );
    }
}
