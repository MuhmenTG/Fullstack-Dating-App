<?php
include('../../server/shop.php');
include('../utilities/request.php');
include('../utilities/response.php');

$shopManager = new ShopManager();
$request = new Request(); 
$response = new Response();


try{
   $getAllProducts = $shopManager->getAllProducts();
   if($getAllProducts){
      echo $response->toJSON($getAllProducts);
   }
   else{
      echo $response->code(400)->toJSON(['error' => "You don't have any requests"]);
   }
}  
catch(Exception $e) 
{
   return $response->code($e->code)->toJSON(['error' => $e->message]);
}
   
  