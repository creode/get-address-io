<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion of address' in the UK.
 *
 * @link      https://creode.co.uk
 * @copyright Copyright (c) 2021 Creode <contact@creode.co.uk>
 */

namespace creode\getaddressio;

use Craft;
use craft\web\View;
use yii\base\Event;

use craft\base\Plugin;
use craft\services\Dashboard;
use creode\getaddressio\models\Settings;
use craft\events\RegisterTemplateRootsEvent;

use craft\events\RegisterComponentTypesEvent;
use creode\getaddressio\services\GuzzleClientService;
use creode\getaddressio\services\AddressLookupService;
use creode\getaddressio\widgets\AddressLookupUsage as AddressLookupUsageWidget;

/**
 * Class GetAddressIo
 *
 * @author    Creode <contact@creode.co.uk>
 * @package   GetAddressIo
 * @since     1.0.0
 *
 * @property  AddressLookupService $addressLookupService
 * @property  GuzzleClientService $api
 */
class GetAddressIo extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var GetAddressIo
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public string $schemaVersion = '1.0.0';

    /**
     * @var bool
     */
    public bool $hasCpSettings = true;

    /**
     * @var bool
     */
    public bool $hasCpSection = false;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        $this->setTemplateRoots();

        $this->setComponents([
            'addressLookupService' => AddressLookupService::class,
            'api' => GuzzleClientService::class,
        ]);

        // Registers a new Dashboard Widget
        Event::on(
            Dashboard::class,
            Dashboard::EVENT_REGISTER_WIDGET_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = AddressLookupUsageWidget::class;
            }
        );

        Craft::info(
            Craft::t(
                'get-address-io',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * Sets up the ability for Craft templates to overwrite the ones in this plugin.
     */
    protected function setTemplateRoots()
    {
        Event::on(
            View::class,
            View::EVENT_REGISTER_SITE_TEMPLATE_ROOTS,
            function (RegisterTemplateRootsEvent $event) {
                $event->roots['_get-address-io'] = __DIR__ . '/templates/get-address-io';
            }
        );
    }

    /**
     * @inheritdoc
     */
    protected function createSettingsModel(): ?\craft\base\Model
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'get-address-io/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
}
