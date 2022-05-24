<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../../server/chatSystem.php');
include('../utilities/request.php');
include('../utilities/response.php');
     
$chatSystem = new ChatSystem();
$request = new Request(); 
$response = new Response();


$userId = $request->get("userId");
$friendId = $request->get("friendId");

if(!$request->has('userId') || !$request->has('friendId')) {
  
    return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}

try {
  
    $getConversation = $chatSystem->getConversationBetweenTwoUsers($userId, $friendId);
    if($getConversation){
        echo $response->code(200)->toJSON($getConversation);
    }
    else{
        echo $response->code(400)->toJSON(['error' => "Something went wrong"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
 
    
   