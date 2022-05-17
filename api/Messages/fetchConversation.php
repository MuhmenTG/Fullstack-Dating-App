<?php
include('../../server/chatSystem.php');
include('../utilities/request.php');
include('../utilities/response.php');
     
$chatSystem = new ChatSystem();
$request = new Request(); 
$response = new Response();

$senderId = $request->get("senderId");
$reciverId = $request->get("reciverId"); 

if(!$request->has('senderId') || !$request->has('reciverId')) {
    return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}

try {
    $getConversation = $chatSystem->getConversationBetweenTwoUsers($senderId, $reciverId);
    if($getConversation){
        echo $response->code(200)->toJSON($getConversation);
    }
    else{
        echo $response->code(400)->toJSON(['error' => "Something went wrong"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
 
    
   