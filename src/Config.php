<?php

/**
 * Created by PhpStorm.
 * User: jorn
 * Date: 5-3-19
 * Time: 15:52
 */

namespace Paynl\IDIN;

use Curl\Curl;

class Config
{
    /**
     * @var string the authentication token
     */
    private $token;

    /**
     * @var string
     */
    private $tokeCode;

    /**
     * @var string the baseUrl of the API
     */
    private $baseUrl = 'https://rest-api.pay.nl/';

    /*
     * @var string the version of the API
     */
    private $apiVersion = 1;

    /**
     * @var Curl the request handler
     */
    private $curl;

    /**
     * @return String
     */
    public function getToken(): String
    {
        return $this->token;
    }

    /**
     * @param String $token
     */
    public function setToken(String $token)
    {
        $this->token = $token;
    }

    /**
     * @param String $tokenCode
     */
    public function setTokenCode(String $tokenCode)
    {
        $this->tokenCode = $tokenCode;
    }

    /**
     * @return String
     */
    public function getTokenCode(): String
    {
        return $this->tokenCode;
    }

    /**
     * @return String
     */
    public function getBaseUrl(): String
    {
        return $this->baseUrl;
    }

    /**
     * @param String $baseURL
     */
    public function setBaseUrl(String $baseURL)
    {
        $this->baseUrl = $baseURL;
    }

    /**
     * @param string $endpoint The endpoint of the API, for example Transaction/Start
     * @param int|null $version
     *
     * @return string The url to the api
     */
    public function getApiUrl($endpoint, $version = null)
    {
        if ($version === null) {
            $version = $this->apiVersion;
        }

        return $this->baseUrl . '/v' . $version . '/' . $endpoint . '/json';
    }

    /**
     * @return int
     */
    public function getApiVersion(): int
    {
        return $this->apiVersion;
    }

    /**
     * @param String $version
     */
    public function setApiVersion(String $version)
    {
        $this->apiVersion = $version;
    }

    /**
     * @return Curl
     * @throws \ErrorException
     */
    public function getCurl(): Curl
    {
        if ( ! isset($this->curl)) {
            $this->curl = new Curl;
        }

        return $this->curl;
    }

    /**
     * @param Curl $ch
     */
    public function setCurl(Curl $ch)
    {
        if (is_string($ch)) {
            $ch = new $ch;
        }

        $this->curl = $ch;
    }

}