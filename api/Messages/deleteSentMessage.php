<?php

include('../../server/chatSystem.php');
include('../utilities/request.php');
include('../utilities/response.php');
     
$chatSystem = new ChatSystem();
$request = new Request(); 
$response = new Response();

$senderId = $request->get("senderId");
$reciverId = $request->get("reciverId"); 
$messageId = $request->get("messageId");

if(!$request->has('senderId') || !$request->has('reciverId') || !$request->has('messageId')) {
    return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}

try {
    $isMessageDeleted = $chatSystem->deleteSentMessage($senderId, $reciverId, $messageId);
    if($isMessageDeleted){
        echo $response->toJSON([$isMessageDeleted]);
    }
    else{
       echo $response->code(400)->toJSON(['error' => "Could not delete message"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
 
    
   