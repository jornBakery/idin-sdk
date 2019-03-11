<?php
/**
 * Created by PhpStorm.
 * User: jorn
 * Date: 7-3-19
 * Time: 15:14
 */

require_once '../vendor/autoload.php';
require_once 'config.php';

try {

    $sdk    = new \Paynl\IDIN\IDIN($config);
    $result = $sdk->getStatus([
        'transactionId' => 'DA-1234-1234-1234'
    ]);

    print_r($result->getData());
} catch (\Paynl\IDIN\Error\Error $error) {
    echo $error->getMessage();
}