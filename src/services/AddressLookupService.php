<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion address' using UK Postcoes
 *
 * @link      https://creode.co.uk
 * @copyright Copyright (c) 2021 Creode <contact@creode.co.uk>
 */

namespace creode\getaddressio\services;

use creode\getaddressio\GetAddressIo;

use Craft;
use craft\base\Component;

/**
 * @author    Creode <contact@creode.co.uk>
 * @package   GetAddressIo
 * @since     1.0.0
 */
class AddressLookupService extends Component
{
    private $errorMessages = [
        400 => 'Invalid postcode data provided.',
        401 => 'Invalid API Key Configured.',
        403 => 'Invalid Permissions configured',
        404 => 'Postcode not found.',
        429 => 'Lookup Rate Limit Hit.',
        500 => 'Postcode Service is down',
    ];
    
    // Public Methods
    // =========================================================================

    /*
     * @return mixed
     */
    public function autocomplete(string $searchQuery)
    {
        if (empty(GetAddressIo::$plugin->getSettings()->apiKey)) {
            // Throw an error.
            throw new \Exception('getaddress.io API Key not set. Please add this to plugins configuration screen.');
        }

        $client = GetAddressIo::$plugin
            ->addressGuzzleFactoryService
            ->getClient();

        $response = false;
        $errors = [];

        // dd($searchQuery);
        try {
            $response = $client->request(
                'GET',
                "autocomplete/{$searchQuery}",
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

        $data = [];
        if ($response) {
            $data = json_decode(
                $response->getBody()
                    ->getContents()
            );
        }

        return (object) [
            'response' => $data,
            'errors' => $errors,
            'hasErrors' => (bool) count($errors),
        ];
    }
}
