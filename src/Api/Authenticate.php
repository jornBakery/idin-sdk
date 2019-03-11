<?php
/**
 * Created by PhpStorm.
 * User: jorn
 * Date: 6-3-19
 * Time: 10:09
 */

namespace Paynl\IDIN\Api;


use Paynl\IDIN\Error\Error;

class Authenticate extends Api
{
    /**
     * @var int
     */
    public $apiVersion = 1;

    /**
     * @var String
     */
    private $_reference;

    /**
     * @var String
     */
    private $_issuerId;

    /**
     * @var String
     */
    private $_language;

    /**
     * @var String
     */
    private $_returnUrl;

    /**
     * @var String
     */
    private $_exchangeUrl;

    /** @var array $_idin_data : 0 = false; 1 = true */
    private $_idin_data = [
        'name'        => 0,
        'address'     => 0,
        'isEighteen'  => 0,
        'dateOfBirth' => 0,
        'gender'      => 0,
        'email'       => 0,
        'phone'       => 0,
        'iban'        => 0
    ];

    /**
     * @param null $endPoint
     * @param null $version
     *
     * @return array
     * @throws Error
     */
    public function doRequest($endPoint = null, $version = null)
    {
        return parent::doRequest('IDIN/authenticate');
    }

    /**
     * @param String $reference
     */
    public function setReference(String $reference)
    {
        $this->_reference = $reference;
    }

    /**
     * @param String $issuerId
     */
    public function setIssuerId(String $issuerId)
    {
        $this->_issuerId = $issuerId;
    }

    /**
     * @param String $language
     */
    public function setLanguage(String $language)
    {
        $this->_language = $language;
    }

    /**
     * @param String $returnUrl
     */
    public function setReturnUrl(String $returnUrl)
    {
        $this->_returnUrl = $returnUrl;
    }

    /**
     * @param String $exchangeUrl
     */
    public function setExchangeUrl(String $exchangeUrl)
    {

        $this->_exchangeUrl = $exchangeUrl;
    }

    /**
     * @param array $options
     */
    public function setIDINData(array $options = [])
    {
        // Parse all True and False values to 0 or 1
        if (isset($options['name'])) {
            $this->_idin_data['name'] = (($options['name'] == true) ? 1 : 0);
        }

        if (isset($options['address'])) {
            $this->_idin_data['address'] = (($options['address'] == true) ? 1 : 0);
        }

        if (isset($options['isEighteen'])) {
            $this->_idin_data['isEighteen'] = (($options['isEighteen'] == true) ? 1 : 0);
        }

        if (isset($options['dateOfBirth'])) {
            $this->_idin_data['dateOfBirth'] = (($options['dateOfBirth'] == true) ? 1 : 0);
        }

        if (isset($options['gender'])) {
            $this->_idin_data['gender'] = (($options['gender'] == true) ? 1 : 0);
        }

        if (isset($options['email'])) {
            $this->_idin_data['email'] = (($options['email'] == true) ? 1 : 0);
        }

        if (isset($options['phone'])) {
            $this->_idin_data['phone'] = (($options['phone'] == true) ? 1 : 0);
        }

        if (isset($options['iban'])) {
            $this->_idin_data['iban'] = (($options['iban'] == true) ? 1 : 0);
        }
    }

    /**
     * @return array
     * @throws Error
     */
    protected function getData()
    {
        if ( ! isset($this->_reference)) {
            throw new Error("Invalid reference");
        }

        $data['reference'] = $this->_reference;

        if ( ! isset($this->_issuerId)) {
            throw new Error("Invalid issuer ID");
        }

        $data['issuerId'] = $this->_issuerId;

        if ( ! filter_var($this->_returnUrl, FILTER_VALIDATE_URL)) {
            throw new Error("Invalid return URL");
        }

        $data['returnUrl'] = $this->_returnUrl;

        // Language is optional
        if (isset($this->_language)) {
            if ( ! isset($this->_language) || strlen($this->_language) != 2) {
                throw new Error("Invalid language");
            }
            $data['language'] = $this->_language;
        }

        // exchangeUrl is optional
        if (isset($this->_exchangeUrl)) {
            if ( ! filter_var($this->_exchangeUrl, FILTER_VALIDATE_URL)) {
                throw new Error("Invalid exchange URL");
            }
            $data['exchangeUrl'] = $this->_exchangeUrl;
        }

        $data['data'] = $this->_idin_data;

        $this->data = array_merge($data, $this->data);

        return parent::getData();
    }
}