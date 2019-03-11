<?php
/**
 * Created by PhpStorm.
 * User: jorn
 * Date: 6-3-19
 * Time: 10:07
 */

namespace Paynl\IDIN\Result;


class Authenticate extends Result
{
    /**
     * @return String
     */
    public function getTransactionId(): String
    {
        return $this->data['trxid'];
    }

    /**
     * @return String
     */
    public function getEntranceCode(): String
    {
        return $this->data['ec'];
    }

    /**
     * @return String
     */
    public function getIssuerUrl(): String
    {
        return $this->data['issuerUrl'];
    }
}