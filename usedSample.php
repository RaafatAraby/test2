<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'restRequest.php';
$restRequest = new restRequest();
$restRequest->setVerb('GET');
$restRequest->setCustomeCurlParams(array(
    'CURLOPT_SSL_VERIFYPEER' => false,
    'CURLOPT_SSL_VERIFYHOST' => 2
));
$restRequest->setUrl("https://610b3084c6932baa25e6b1ca3144bbb4:1d4d69df08dd2a09ab1447b575d93e42@raafataraby.myshopify.com/admin/orders.json");
/*
$restRequest->setCustomeHeader(array(
	'Auth' => 'Basic '
));
*/
$restRequest->execute();
$result = $restRequest->getResponseBody();
$originalData = json_decode($result, true);
var_dump($result);
var_dump($originalData);