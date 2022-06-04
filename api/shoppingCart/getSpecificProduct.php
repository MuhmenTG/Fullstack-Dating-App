<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../../server/shop.php');
include('../utilities/response.php');
include('../utilities/request.php');


$shopManager = new ShopManager();
$request = new Request(); 
$response = new Response();

$productId = $request->get("productId");

if(!$request->has('productId')) {
    return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}


try {
    $specificProduct = $shopManager->getSpeficProduct($productId); 
    if($specificProduct){
        echo $response->toJSON($specificProduct);
    }
    else{
       echo $response->code(400)->toJSON(['error' => "Could not find product"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
 
