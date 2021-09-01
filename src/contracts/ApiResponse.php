<?php
/**
 * Get Address IO plugin for Craft CMS 3.x
 *
 * Integrates Craft CMS with the getaddress IO service for autocompletion of address' in the UK.
 *
 * @link      https://creode.co.uk
 * @copyright Copyright (c) 2021 Creode <contact@creode.co.uk>
 */

namespace creode\getaddressio\contracts;

class ApiResponse
{
    /**
     * JSON Encoded string containing the API Response.
     *
     * @var string
     */
    public $response;

    /**
     * Array containing a list of errors.
     *
     * @var array
     */
    public $errors;

    /**
     * Whether this response has any errors.
     *
     * @var boolean
     */
    public $hasErrors = false;

    /**
     * Constructor for the class.
     *
     * @param string $response
     * @param array $errors
     */
    public function __construct($response, $errors = [])
    {
        $this->response = $response;
        $this->errors = $errors;
        $this->hasErrors = (bool) count($errors);
    }
}
