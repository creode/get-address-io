<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion address' using UK Postcoes
 *
 * @link      https://jaymeh.co.uk
 * @copyright Copyright (c) 2021 Jamie Sykes <contact@jaymeh.co.uk>
 */

namespace jaymeh\getaddressio\controllers;

use jaymeh\getaddressio\GetAddressIo;

use Craft;
use craft\web\Controller;

/**
 * @author    Jamie Sykes <contact@jaymeh.co.uk>
 * @package   GetAddressIo
 * @since     1.0.0
 */
class AjaxLookupController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index', 'do-something'];

    // Public Methods
    // =========================================================================

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'Welcome to the AjaxLookupController actionIndex() method';

        return $result;
    }

    /**
     * @return mixed
     */
    public function actionDoSomething()
    {
        $result = 'Welcome to the AjaxLookupController actionDoSomething() method';

        return $result;
    }
}
