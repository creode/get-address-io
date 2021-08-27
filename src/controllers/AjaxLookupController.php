<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion address' using UK Postcoes
 *
 * @link      https://creode.co.uk
 * @copyright Copyright (c) 2021 Creode <contact@creode.co.uk>
 */

namespace creode\getaddressio\controllers;

use Craft;

use craft\web\Controller;
use yii\web\NotFoundHttpException;
use creode\getaddressio\GetAddressIo;

/**
 * @author    Creode <contact@creode.co.uk>
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
    protected $allowAnonymous = ['autocomplete'];

    // Public Methods
    // =========================================================================

    /**
     * @return mixed
     */
    public function actionAutocomplete()
    {
        // This request is ajax only.
        if (!$this->request->isAjax) {
            throw new NotFoundHttpException();
        }

        return $this->asJson(
            GetAddressIo::$plugin
                ->addressLookupService
                ->autocomplete(
                    Craft::$app->request->getQueryParam('term')
                )
        );
    }
}
