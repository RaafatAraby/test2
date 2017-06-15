<?php


//error_reporting(0);
include 'restRequest.php';
$restRequest = new restRequest();


$mainLink = 'https://610b3084c6932baa25e6b1ca3144bbb4:1d4d69df08dd2a09ab1447b575d93e42@raafataraby.myshopify.com/admin';
$mainURL = "{$mainLink}/products.json";

$restRequest->setUrl($mainURL);

$restRequest->setVerb('GET');
$restRequest->setCustomeCurlParams(array(
    'CURLOPT_SSL_VERIFYPEER' => false,
    'CURLOPT_SSL_VERIFYHOST' => 2
));

$restRequest->execute();
$result = $restRequest->getResponseBody();
$data = json_decode($result, TRUE);


$response = json_decode($restRequest->getResponseBody(), true);
$products = $response['products'];


$rowCount = 1;
//check if it has products 


$preparedProductsForExcel = array();

if (count($products) > 0) {
    foreach ($products as $product) {
		echo '</br>' . 'product title : ' .$product['title'] . '  ' . ' , ';
        $productMainTitle = $product['title'];
        $productWithVariantTitle = $productMainTitle;
        $mainImage = '';
        if (is_array($product['id']) and ! empty($product['id']))
            $mainImage = $product['id'][0]['src'];
        //variants
        if (is_array($product['variants']) && count($product['variants']) > 0) {
            foreach ($product['variants'] as $variant) {
                $addProduct = true;

                if ($variant['id'] != '' && $variant['id'] != 'Default Title') {
                    $productWithVariantTitle = $productMainTitle . ' - ' . $variant['id'];
                }
                //tags
                //check the vendors
                $lastVendor = '';
                $commision = '';
                $category = '';
                $barcode = $variant['id'];
				$updateVariantData = array('variant' => 
    array(
		'barcode' => $variant['id']
    )
);

$restRequest->setUrl($mainLink.'/variants/'.$variant['id'].'.json');
$restRequest->setVerb('PUT');
$restRequest->setCustomeCurlParams(array(
    'CURLOPT_SSL_VERIFYPEER' => false,
    'CURLOPT_SSL_VERIFYHOST' => 2
));
$restRequest->setContentType('application/json');
$restRequest->buildPostBody(json_encode($updateVariantData));
$restRequest->execute();

$response = json_decode($restRequest->getResponseBody(), true);
var_dump($response);

            }
        }
    }
} else
    echo 'No products found';
$rowCount = 1;


