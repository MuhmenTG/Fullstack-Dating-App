<?php

include('../../server/chatSystem.php');
include('../utilities/request.php');
include('../utilities/response.php');
     
$chatSystem = new ChatSystem();
$request = new Request(); 
$response = new Response();

$userId = $request->get("userId");
$friendId = $request->get("friendId"); 
$message = $request->get("message");

if(!$request->has('userId') || !$request->has('friendId') || !$request->has('message')) {
    return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}

try {
    $createMessage = $chatSystem->addNewMessage($userId, $friendId, $message);
    if($createMessage){
        echo $createMessage;
    }
    else{
        echo $response->code(400)->toJSON(['error' => "Something went wrong"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
 
    
   