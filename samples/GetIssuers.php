<?php
/**
 * Created by PhpStorm.
 * User: jorn
 * Date: 7-3-19
 * Time: 14:13
 */

require_once '../vendor/autoload.php';
require_once 'config.php';

try {
    $sdk    = new \Paynl\IDIN\IDIN($config);
    $result = $sdk->getIssuers();

    print_r($result);
} catch (\Paynl\IDIN\Error\Error $error) {
    echo $error->getMessage();
}