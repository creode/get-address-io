<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion address' using UK Postcoes
 *
 * @link      https://jaymeh.co.uk
 * @copyright Copyright (c) 2021 Jamie Sykes <contact@jaymeh.co.uk>
 */

namespace jaymeh\getaddressiotests\unit;

use Codeception\Test\Unit;
use UnitTester;
use Craft;
use jaymeh\getaddressio\GetAddressIo;

/**
 * ExampleUnitTest
 *
 *
 * @author    Jamie Sykes <contact@jaymeh.co.uk>
 * @package   GetAddressIo
 * @since     1.0.0
 */
class ExampleUnitTest extends Unit
{
    // Properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Public methods
    // =========================================================================

    // Tests
    // =========================================================================

    /**
     *
     */
    public function testPluginInstance()
    {
        $this->assertInstanceOf(
            GetAddressIo::class,
            GetAddressIo::$plugin
        );
    }

    /**
     *
     */
    public function testCraftEdition()
    {
        Craft::$app->setEdition(Craft::Pro);

        $this->assertSame(
            Craft::Pro,
            Craft::$app->getEdition()
        );
    }
}
