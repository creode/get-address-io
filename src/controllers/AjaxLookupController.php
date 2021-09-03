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
    protected $allowAnonymous = ['autocomplete', 'get-by-id', 'get-by-postcode'];

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
        if (Craft::$app->getRequest()->getRequiredParam('postcode') === 'S72 7AB') {
            return $this->asJson(json_decode('{
                "response": {
                    "postcode": "S72 7AB",
                    "latitude": 53.580589294433594,
                    "longitude": -1.3826373815536499,
                    "addresses": [
                        {
                            "formatted_address": [
                                "1 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "1",
                            "line_1": "1 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "10 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "10",
                            "line_1": "10 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "11 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "11",
                            "line_1": "11 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "12 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "12",
                            "line_1": "12 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "14 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "14",
                            "line_1": "14 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "15 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "15",
                            "line_1": "15 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "16 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "16",
                            "line_1": "16 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "17 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "17",
                            "line_1": "17 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "18 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "18",
                            "line_1": "18 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "19 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "19",
                            "line_1": "19 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "2 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "2",
                            "line_1": "2 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "20 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "20",
                            "line_1": "20 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "21 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "21",
                            "line_1": "21 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "22 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "22",
                            "line_1": "22 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "23 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "23",
                            "line_1": "23 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "24 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "24",
                            "line_1": "24 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "25 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "25",
                            "line_1": "25 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "26 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "26",
                            "line_1": "26 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "27 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "27",
                            "line_1": "27 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "28 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "28",
                            "line_1": "28 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "29 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "29",
                            "line_1": "29 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "3 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "3",
                            "line_1": "3 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "30 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "30",
                            "line_1": "30 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "31 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "31",
                            "line_1": "31 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "32 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "32",
                            "line_1": "32 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "33 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "33",
                            "line_1": "33 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "34 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "34",
                            "line_1": "34 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "35 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "35",
                            "line_1": "35 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "36 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "36",
                            "line_1": "36 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "37 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "37",
                            "line_1": "37 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "38 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "38",
                            "line_1": "38 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "39 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "39",
                            "line_1": "39 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "4 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "4",
                            "line_1": "4 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "40 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "40",
                            "line_1": "40 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "42 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "42",
                            "line_1": "42 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "44 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "44",
                            "line_1": "44 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "49 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "49",
                            "line_1": "49 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "5 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "5",
                            "line_1": "5 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "51 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "51",
                            "line_1": "51 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "53 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "53",
                            "line_1": "53 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "55 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "55",
                            "line_1": "55 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "57 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "57",
                            "line_1": "57 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "59 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "59",
                            "line_1": "59 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "6 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "6",
                            "line_1": "6 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "61 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "61",
                            "line_1": "61 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "63 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "63",
                            "line_1": "63 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "65 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "65",
                            "line_1": "65 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "67 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "67",
                            "line_1": "67 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "69 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "69",
                            "line_1": "69 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "7 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "7",
                            "line_1": "7 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "8 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "8",
                            "line_1": "8 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        },
                        {
                            "formatted_address": [
                                "9 Shireoaks Way",
                                "",
                                "",
                                "Grimethorpe, Barnsley",
                                "South Yorkshire"
                            ],
                            "thoroughfare": "Shireoaks Way",
                            "building_name": "",
                            "sub_building_name": "",
                            "sub_building_number": "",
                            "building_number": "9",
                            "line_1": "9 Shireoaks Way",
                            "line_2": "",
                            "line_3": "",
                            "line_4": "",
                            "locality": "Grimethorpe",
                            "town_or_city": "Barnsley",
                            "county": "South Yorkshire",
                            "district": "Barnsley",
                            "country": "England"
                        }
                    ]
                },
                "errors": [],
                "hasErrors": false
            }'));
        }

        return $this->asJson(json_decode('{
            "response": {
                "postcode": "LS1 5QS",
                "latitude": 53.798754000000002,
                "longitude": -1.5490489999999999,
                "addresses": [
                    {
                        "formatted_address": [
                            "12 South Parade",
                            "",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "",
                        "sub_building_number": "",
                        "building_number": "12",
                        "line_1": "12 South Parade",
                        "line_2": "",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "3volution LLP",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "3volution LLP",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "3volution LLP",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Armstrong Watson",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Armstrong Watson",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Armstrong Watson",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Arrisuma Ltd",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Arrisuma Ltd",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Arrisuma Ltd",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Atypical Media Ltd",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Atypical Media Ltd",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Atypical Media Ltd",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Barmston (Park Row) Llp",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Barmston (Park Row) Llp",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Barmston (Park Row) Llp",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Barmston Developments Ltd",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Barmston Developments Ltd",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Barmston Developments Ltd",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Below Stairs Ltd",
                            "12 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Below Stairs Ltd",
                        "sub_building_number": "",
                        "building_number": "12",
                        "line_1": "Below Stairs Ltd",
                        "line_2": "12 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Big Lottery Fund",
                            "Consort House",
                            "12 South Parade",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "Consort House",
                        "sub_building_name": "Big Lottery Fund",
                        "sub_building_number": "",
                        "building_number": "12",
                        "line_1": "Big Lottery Fund",
                        "line_2": "Consort House",
                        "line_3": "12 South Parade",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Blueberry Marketing Solutions Ltd",
                            "Consort House",
                            "12 South Parade",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "Consort House",
                        "sub_building_name": "Blueberry Marketing Solutions Ltd",
                        "sub_building_number": "",
                        "building_number": "12",
                        "line_1": "Blueberry Marketing Solutions Ltd",
                        "line_2": "Consort House",
                        "line_3": "12 South Parade",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Boston Recruitment (Uk) Ltd",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Boston Recruitment (Uk) Ltd",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Boston Recruitment (Uk) Ltd",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Broughton Group Ltd",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Broughton Group Ltd",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Broughton Group Ltd",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Central College of Health & Beauty",
                            "Friends Provident House",
                            "13-14 South Parade",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "Friends Provident House",
                        "sub_building_name": "Central College of Health & Beauty",
                        "sub_building_number": "",
                        "building_number": "13-14",
                        "line_1": "Central College of Health & Beauty",
                        "line_2": "Friends Provident House",
                        "line_3": "13-14 South Parade",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Chase Court (Redhouse) Ltd",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Chase Court (Redhouse) Ltd",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Chase Court (Redhouse) Ltd",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Commerce Park One Ltd",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Commerce Park One Ltd",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Commerce Park One Ltd",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Creode Ltd",
                            "Consort House",
                            "12 South Parade",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "Consort House",
                        "sub_building_name": "Creode Ltd",
                        "sub_building_number": "",
                        "building_number": "12",
                        "line_1": "Creode Ltd",
                        "line_2": "Consort House",
                        "line_3": "12 South Parade",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Faceperfect Clinic Ltd",
                            "Consort House",
                            "12 South Parade",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "Consort House",
                        "sub_building_name": "Faceperfect Clinic Ltd",
                        "sub_building_number": "",
                        "building_number": "12",
                        "line_1": "Faceperfect Clinic Ltd",
                        "line_2": "Consort House",
                        "line_3": "12 South Parade",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Fawley Watson Booth",
                            "Friends Provident House",
                            "13-14 South Parade",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "Friends Provident House",
                        "sub_building_name": "Fawley Watson Booth",
                        "sub_building_number": "",
                        "building_number": "13-14",
                        "line_1": "Fawley Watson Booth",
                        "line_2": "Friends Provident House",
                        "line_3": "13-14 South Parade",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Ferox Securities Ltd",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Ferox Securities Ltd",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Ferox Securities Ltd",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Forbes Solicitors Ltd",
                            "Friends Provident House",
                            "13-14 South Parade",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "Friends Provident House",
                        "sub_building_name": "Forbes Solicitors Ltd",
                        "sub_building_number": "",
                        "building_number": "13-14",
                        "line_1": "Forbes Solicitors Ltd",
                        "line_2": "Friends Provident House",
                        "line_3": "13-14 South Parade",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Laudale Associates Ltd",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Laudale Associates Ltd",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Laudale Associates Ltd",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Lockton Co LLP",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Lockton Co LLP",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Lockton Co LLP",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Mm&F Fiduciary Ltd",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Mm&F Fiduciary Ltd",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Mm&F Fiduciary Ltd",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Mm&F Trustees Ltd",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Mm&F Trustees Ltd",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Mm&F Trustees Ltd",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Moore Estates Ltd",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Moore Estates Ltd",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Moore Estates Ltd",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Moores Management & Finance",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Moores Management & Finance",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Moores Management & Finance",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Northern Rail",
                            "Friends Provident House",
                            "13-14 South Parade",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "Friends Provident House",
                        "sub_building_name": "Northern Rail",
                        "sub_building_number": "",
                        "building_number": "13-14",
                        "line_1": "Northern Rail",
                        "line_2": "Friends Provident House",
                        "line_3": "13-14 South Parade",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Odgers Ltd",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Odgers Ltd",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Odgers Ltd",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Open Path Agency Ltd",
                            "12 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Open Path Agency Ltd",
                        "sub_building_number": "",
                        "building_number": "12",
                        "line_1": "Open Path Agency Ltd",
                        "line_2": "12 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Q B E",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Q B E",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Q B E",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "R N Saunders Ltd",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "R N Saunders Ltd",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "R N Saunders Ltd",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Simpson & Marwick",
                            "Friends Provident House",
                            "13-14 South Parade",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "Friends Provident House",
                        "sub_building_name": "Simpson & Marwick",
                        "sub_building_number": "",
                        "building_number": "13-14",
                        "line_1": "Simpson & Marwick",
                        "line_2": "Friends Provident House",
                        "line_3": "13-14 South Parade",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "The George A. Moore Foundation",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "The George A. Moore Foundation",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "The George A. Moore Foundation",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Thomlinsons Ltd",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Thomlinsons Ltd",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Thomlinsons Ltd",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Thorn Baker",
                            "Friends Provident House",
                            "13-14 South Parade",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "Friends Provident House",
                        "sub_building_name": "Thorn Baker",
                        "sub_building_number": "",
                        "building_number": "13-14",
                        "line_1": "Thorn Baker",
                        "line_2": "Friends Provident House",
                        "line_3": "13-14 South Parade",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Venn",
                            "Friends Provident House",
                            "13-14 South Parade",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "Friends Provident House",
                        "sub_building_name": "Venn",
                        "sub_building_number": "",
                        "building_number": "13-14",
                        "line_1": "Venn",
                        "line_2": "Friends Provident House",
                        "line_3": "13-14 South Parade",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Wilton Developments Ltd",
                            "10 South Parade",
                            "",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "",
                        "sub_building_name": "Wilton Developments Ltd",
                        "sub_building_number": "",
                        "building_number": "10",
                        "line_1": "Wilton Developments Ltd",
                        "line_2": "10 South Parade",
                        "line_3": "",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    },
                    {
                        "formatted_address": [
                            "Y F M Private Equity Ltd",
                            "Friends Provident House",
                            "13-14 South Parade",
                            "Leeds",
                            "West Yorkshire"
                        ],
                        "thoroughfare": "South Parade",
                        "building_name": "Friends Provident House",
                        "sub_building_name": "Y F M Private Equity Ltd",
                        "sub_building_number": "",
                        "building_number": "13-14",
                        "line_1": "Y F M Private Equity Ltd",
                        "line_2": "Friends Provident House",
                        "line_3": "13-14 South Parade",
                        "line_4": "",
                        "locality": "",
                        "town_or_city": "Leeds",
                        "county": "West Yorkshire",
                        "district": "Leeds",
                        "country": "England"
                    }
                ]
            },
            "errors": [],
            "hasErrors": false
        }'));

        // // Forces CSRF Verification.
        // $this->requirePostRequest();

        // // This request is ajax only.
        // if (!$this->request->isAjax) {
        //     throw new NotFoundHttpException();
        // }

        // $postcode = Craft::$app
        //     ->getRequest()
        //     ->getRequiredParam('postcode');
        // if (empty($postcode)) {
        //     return $this->asJson([
        //         'hasErrors' => true,
        //         'response' => [],
        //         'errors' => ['No postcode provided.']
        //     ]);
        // }

        // return $this->asJson(
        //     GetAddressIo::$plugin
        //         ->addressLookupService
        //         ->getAddressesByPostcode(
        //             $postcode
        //         )
        // );
    }
}
