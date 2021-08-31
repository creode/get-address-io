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

use creode\getaddressio\contracts\services\ApiFactory;
use GuzzleHttp\Client as GuzzleClient;

/**
 * @author    Creode <contact@creode.co.uk>
 * @package   GetAddressIo
 * @since     1.0.0
 */
class GuzzleClientFactoryService extends ApiFactory
{
    // Public Methods
    // =========================================================================

    /*
     * @inheritdoc
     */
    public function autocomplete(string $searchTerm): object
    {
        if (empty(GetAddressIo::$plugin->getSettings()->getAPIKey())) {
            // Throw an error.
            throw new \Exception('getaddress.io API Key not set. Please add this to plugins configuration screen.');
        }

        $client = $this->get();

        $response = false;
        $errors = [];

        try {
            $response = $client->request(
                'GET',
                "autocomplete/{$searchTerm}",
                [
                    'query' => [
                        'api-key' => GetAddressIo::$plugin->getSettings()->getAPIKey(),
                    ],
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

        $responseContent = [];
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

    // Protected Methods
    // =========================================================================

    /**
     * Builds a predefined guzzle client with the correct options.
     *
     * @return GuzzleClient
     */
    protected function get()
    {
        return new GuzzleClient(
            [
                'base_uri' => 'https://api.getAddress.io/',
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]
        );
    }
}
