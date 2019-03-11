<?php
/**
 * Created by PhpStorm.
 * User: jorn
 * Date: 6-3-19
 * Time: 10:10
 */

namespace Paynl\IDIN\Api;


use Paynl\IDIN\Error\Error;

class Status extends Api
{
    /**
     * @var int version of the API
     */
    public $apiVersion = 1;

    /**
     * @var String
     */
    private $_trxid;

    /**
     * @param String|null $endPoint
     * @param String|null $version
     *
     * @return array
     * @throws Error
     */
    public function doRequest($endPoint = null, $version = null)
    {
        return parent::doRequest('IDIN/status');
    }

    /**
     * @param String $transactionId
     */
    public function setTransactionId(String $transactionId)
    {
        $this->_trxid = $transactionId;
    }

    /**
     * @return array
     * @throws Error
     */
    protected function getData()
    {
        if ( ! isset($this->_trxid) || ! preg_match("/^DA-[0-9]{4}-[0-9]{4}-[0-9]{4}$/", $this->_trxid)) {
            throw new Error("Invalid transactionId");
        }

        $data['trxid'] = $this->_trxid;
        $this->data    = array_merge($data, $this->data);


        return parent::getData();
    }
}