<?php
session_start();
include('../../server/user.php');
include('../utilities/request.php');
include('../utilities/response.php');

$user = new User();
$request = new Request(); 
$response = new Response();

$userId = $request->get("id");

if(!$request->has('id')) {
   return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}

try{
   $userResult = $user->getUserInfo($userId);
   if($userResult){
      echo $response->toJSON($userResult);
   }
   
}  
catch(Exception $e) 
{
  return $response->code($e->code)->toJSON(['error' => $e->message]);
}
  
 


