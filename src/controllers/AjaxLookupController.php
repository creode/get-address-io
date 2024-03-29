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
    protected array|int|bool $allowAnonymous = ['autocomplete', 'get-by-id', 'get-by-postcode'];

    // Public Methods
    // =========================================================================

    /**
     * Exposes the results of the Autocomplete functionality on the https://getaddress.io API.
     * This route url is /actions/get-address-io/ajax-lookup/autocomplete
     *
     * @return yii\web\Response
     */
    public function actionAutocomplete()
    {
        $this->requirePostRequest();

        // This request is ajax only.
        if (!$this->request->isAjax) {
            throw new NotFoundHttpException();
        }

        return $this->asJson(
            GetAddressIo::$plugin
                ->addressLookupService
                ->autocomplete(
                    Craft::$app->request->getBodyParam('term')
                )
        );
    }

    /**
     * Get an address out of the https://getaddress.io API using the id.
     * This routes url is /actions/get-address-io/ajax-lookup/get-by-id
     *
     * @param string|null $id
     * @return yii\web\Response
     */
    public function actionGetById()
    {
        $this->requirePostRequest();

        // This request is ajax only.
        if (!$this->request->isAjax) {
            throw new NotFoundHttpException();
        }

        return $this->asJson(
            GetAddressIo::$plugin
                ->addressLookupService
                ->getAddressById(
                    Craft::$app
                        ->getRequest()
                        ->getRequiredParam('id')
                )
        );
    }

    /**
     * Exposes the results of the Autocomplete functionality on the https://getaddress.io API.
     * This route url is /actions/get-address-io/ajax-lookup/get-by-postcode
     *
     * @param string|null $postcode
     * @return yii\web\Response
     */
    public function actionGetByPostcode()
    {
        // Forces CSRF Verification.
        $this->requirePostRequest();

        // This request is ajax only.
        if (!$this->request->isAjax) {
            throw new NotFoundHttpException();
        }

        $postcode = Craft::$app
            ->getRequest()
            ->getRequiredParam('postcode');
        if (empty($postcode)) {
            return $this->asJson([
                'hasErrors' => true,
                'response' => [],
                'errors' => ['No postcode provided.']
            ]);
        }

        return $this->asJson(
            GetAddressIo::$plugin
                ->addressLookupService
                ->getAddressesByPostcode(
                    $postcode
                )
        );
    }
}
