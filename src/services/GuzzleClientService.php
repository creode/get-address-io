<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion of address' in the UK.
 *
 * @link      https://creode.co.uk
 * @copyright Copyright (c) 2021 Creode <contact@creode.co.uk>
 */

namespace creode\getaddressio\services;

use creode\getaddressio\GetAddressIo;
use GuzzleHttp\Client as GuzzleClient;
use creode\getaddressio\contracts\services\ApiBase;

/**
 * @author    Creode <contact@creode.co.uk>
 * @package   GetAddressIo
 * @since     1.0.0
 */
class GuzzleClientService extends ApiBase
{
    // Public Methods
    // =========================================================================

    public function getAddressesByPostcode(string $postcode): object
    {
        return $this->get("find/$postcode", ['expand' => 'True']);
    }

    /**
     * @inheritdoc
     */
    public function autocomplete(string $searchTerm): object
    {
        return $this->get("autocomplete/$searchTerm");
    }

    /**
     * @inheritdoc
     */
    public function getAddressById(string $id): object
    {
        return $this->get("/get/$id");
    }

    // Protected Methods
    // =========================================================================

    /**
     * Accepts a url parameter and pushes a GET request to the API with the given url.
     *
     * @param string $url The url to call.
     * @param array $parameters Any query parameters provided.
     * @return object
     */
    protected function get($url, $parameters = [])
    {
        if (empty(GetAddressIo::$plugin->getSettings()->getAPIKey())) {
            // Throw an error.
            throw new \Exception('getaddress.io API Key not set. Please add this to plugins configuration screen.');
        }

        $client = $this->getClient();

        $response = false;
        $errors = [];

        $queryParams = ['api-key' => GetAddressIo::$plugin->getSettings()->getAPIKey()];
        $queryParams = array_merge($queryParams, $parameters);

        try {
            $response = $client->request(
                'GET',
                $url,
                [
                    'query' => $queryParams,
                ],
            );
        } catch (\Exception $e) {
            $errors[] = (object) [
                'code'    => $e->getCode(),
                'message' => ! empty(
                    $this->errorMessages[$e->getCode()]
                ) ? $this->errorMessages[$e->getCode()] : 'An unknown error has occured.',
            ];
        }

        $responseContent = '';
        if ($response) {
            $responseContent = json_decode(
                $response->getBody()
                    ->getContents()
            );
        }

        return (object) [
            'response' => $responseContent,
            'errors' => $errors,
            'hasErrors' => (bool) count($errors),
        ];
    }

    /**
     * Builds a predefined guzzle client with the correct options.
     *
     * @return GuzzleClient
     */
    protected function getClient()
    {
        return new GuzzleClient([
            'base_uri' => self::BASE_ADDRESS_API_URL,
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);
    }
}
