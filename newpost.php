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

$data_array = array("order" => array(
            "line_items" => array(
                array(
                    "variant_id" => 10353765828,
                    "quantity" => 1
                )
            ),
            "customer" => array(
                "first_name" => "Paul",
                "last_name" => "Norman",
                "email" => "paul.norman@example.com"
            ),
            "billing_address" => array(
                "first_name" => "John",
                "last_name" => "Smith",
                "address1" => "123 Fake Street",
                "phone" => "555-555-5555",
                "city" => "Fakecity",
                "province" => "Ontario",
                "country" => "Canada",
                "zip" => "K2P 1L4"
            ),
            "shipping_address" => array(
                "first_name" => "Jane",
                "last_name" => "Smith",
                "address1" => "123 Fake Street",
                "phone" => "777-777-7777",
                "city" => "Fakecity",
                "province" => "Ontario",
                "country" => "Canada",
                "zip" => "K2P 1L4"
            ),
            "email" => "jane@example.com",
            ));
			
$json_data = json_encode($data_array);
var_dump($json_data);
$restRequest->execute();