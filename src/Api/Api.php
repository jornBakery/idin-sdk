<?php

/**
 * Created by PhpStorm.
 * User: jorn
 * Date: 5-3-19
 * Time: 16:33
 */

namespace Paynl\IDIN\Api;

use Paynl\IDIN\Config;
use Paynl\IDIN\Error\Error;
use Paynl\IDIN\Helper;

class Api
{
    /**
     * @var int
     */
    protected $version = 1;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var Config
     */
    protected $config;

    /**
     * Api constructor.
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param $endpoint
     * @param null $version
     *
     * @return array
     * @throws Error
     * @throws \ErrorException
     */
    protected function doRequest($endpoint, $version = null)
    {
        if ($version === null) {
            $version = $this->version;
        }

        $auth = $this->getAuth();
        $data = $this->getData();

        $uri = $this->config->getApiUrl($endpoint, (int)$version);

        $curl = $this->config->getCurl();

        // Set Authentication
        $curl->setBasicAuthentication($auth['username'], $auth['password']);

        $result = $curl->post($uri, $data);

        if (isset($result->status) && $result->status == 'FALSE') {
            throw new Error();
        }

        if ($curl->error) {
            throw new Error($curl->getErrorMessage());
        }

        return $this->processResult($result);
    }

    /**
     * @return array
     */
    protected function getData()
    {
        return $this->data;
    }

    /**
     * @return array
     * @throws Error
     */
    private function getAuth()
    {
        $token     = $this->config->getToken();
        $tokenCode = $this->config->getTokenCode();

        if ( ! isset($token)) {
            throw new Error("Token not set");
        }

        if ( ! isset($tokenCode)) {
            throw new Error("TokenCode not set");
        }

        return [
            'username' => $tokenCode,
            'password' => $token
        ];
    }

    /**
     * @param $result
     *
     * @return array
     * @throws Error
     */
    protected function processResult($result)
    {
        $output = Helper::objectToArray($result);

        if ( ! is_array($output)) {
            throw new Error($output);
        }

        if (isset($output['response'])) {
            return $output;
        }

        if (isset($output['request']) && $output['request']['result'] != 1 && $output['request']['result'] !== 'TRUE') {
            throw new Error($output['request']['errorId'] . ' - ' . $output['request']['errorMessage']);
        }

        return $output;
    }
}