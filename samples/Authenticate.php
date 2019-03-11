<?php

/**
 * Created by PhpStorm.
 * User: jorn
 * Date: 7-3-19
 * Time: 11:34
 */

require '../vendor/autoload.php';
require 'config.php';

try {
    $sdk    = new \Paynl\IDIN\IDIN($config);
    $result = $sdk->authenticate([
        'reference'   => $sampleData['reference'],
        'issuerId'    => $sampleData['issuerId'],
        'data'        => $sampleData['data'],
        'returnUrl'   => $sampleData['returnUrl'],
        'exchangeUrl' => $sampleData['exchangeUrl']
    ]);

    print_r($result->getData());

} catch (\Paynl\IDIN\Error\Error $error) {
    echo $error->getMessage();
}
