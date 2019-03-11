<?php

$config = new \Paynl\IDIN\Config();
$config->setToken("API-TOKEN");
$config->setTokenCode("AT-1234-1234");

$sampleData = [
    'reference'   => '',
    'issuerId'    => '',
    'data'        => [
        'name'        => true,
        'address'     => true,
        'isEighteen'  => true,
        'dateOfBirth' => true,
        'gender'      => true,
        'email'       => true,
        'phone'       => true,
        'iban'        => true
    ],
    'returnUrl'   => "https://my.domain/return.php",
    'exchangeUrl' => "https://my.domain/exchange.php"
];