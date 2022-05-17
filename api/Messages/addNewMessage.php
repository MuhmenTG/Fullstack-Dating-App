<?php

include('../../server/chatSystem.php');
include('../utilities/request.php');
include('../utilities/response.php');
     
$chatSystem = new ChatSystem();
$request = new Request(); 
$response = new Response();

$senderId = $request->get("senderId");
$reciverId = $request->get("reciverId"); 
$message = $request->get("message");

if(!$request->has('senderId') || !$request->has('reciverId') || !$request->has('message')) {
    return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}

try {
    $createMessage = $chatSystem->addNewMessage($senderId, $reciverId, $message);
    if($createMessage){
        echo $createMessage;
    }
    else{
        echo $response->code(400)->toJSON(['error' => "Something went wrong"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
 
    
   