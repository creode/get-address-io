<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion of address' in the UK.
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
    protected $allowAnonymous = ['autocomplete', 'get-by-id'];

    // Public Methods
    // =========================================================================

    /**
     * @return mixed

    /**
     * Exposes the results of the Autocomplete functionality on the https://getaddress.io API.
     * This route url is /actions/get-address-io/ajax-lookup/autocomplete
     *
     * @return yii\web\Response
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

    public function actionGetById(?string $id)
    {
        // This request is ajax only.
        if (!$this->request->isAjax) {
            throw new NotFoundHttpException();
        }

        return $this->asJson(
            GetAddressIo::$plugin
                ->addressLookupService
                ->getAddressById(
                    $id
                )
        );
    }
}
