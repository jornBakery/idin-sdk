<?php
/**
 * Created by PhpStorm.
 * User: jorn
 * Date: 6-3-19
 * Time: 10:10
 */

namespace Paynl\IDIN\Api;

use Paynl\IDIN\Error\Error;

class GetIssuers extends Api
{
    /**
     * @var int version of the API
     */
    public $apiVersion = 1;

    /**
     * @param null $endPoint
     * @param null $version
     *
     * @return array
     * @throws Error
     * @throws \ErrorException
     */
    public function doRequest($endPoint = null, $version = null)
    {
        return parent::doRequest('IDIN/getIssuers');
    }
}