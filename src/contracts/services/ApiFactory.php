<?php

namespace creode\getaddressio\contracts\services;

use craft\base\Component;
use GuzzleHttp\Client as GuzzleClient;
use creode\getaddressio\GetAddressIo;

abstract class ApiFactory extends Component
{
    protected $errorMessages = [
        400 => 'Invalid postcode data provided.',
        401 => 'Invalid API Key Configured.',
        403 => 'Invalid Permissions configured',
        404 => 'Postcode not found.',
        429 => 'Lookup Rate Limit Hit.',
        500 => 'Postcode Service is down',
    ];

    /**
     * Main function which is used to make a request to Get Address' autocomplete
     * function.
     *
     * @param string $searchTerm
     * @return object
     */
    abstract public function autocomplete(string $searchTerm): object;

    /**
     * Gets an Address from the API with the provided ID.
     *
     * @param string $id
     * @return object
     */
    abstract public function getAddressById(string $id): object;

    /**
     * Gets all address' associated to a provided postcode.
     *
     * @param string $postcode
     * @return object
     */
    abstract public function getAddressesByPostcode(string $postcode): object;

    /**
     * Builds a predefined guzzle client with the correct options.
     *
     * @return GuzzleClient
     */
    protected function get()
    {
        return new GuzzleClient([
            'base_uri' => 'https://api.getAddress.io/',
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    /**
     * Accepts a url parameter and pushes a GET request to the API with the given url.
     *
     * @param string $url The url to call.
     * @param array $parameters Any query parameters provided.
     * @return object
     */
    protected function callAddressAPI($url, $parameters = [])
    {
        if (empty(GetAddressIo::$plugin->getSettings()->getAPIKey())) {
            // Throw an error.
            throw new \Exception('getaddress.io API Key not set. Please add this to plugins configuration screen.');
        }

        $client = $this->get();

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
}
