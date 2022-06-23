<?php

include('../../../Models/notifications.php');
include('../utilities/request.php');
include('../utilities/response.php');

$notification = new Notification();
$request = new Request(); 
$response = new Response();

$userId = $request->get("id");
$receiverUserId = $request->get("receiverUserId"); 
$message = $request->get("message");

if(!$request->has('id') || !$request->has('receiverUserId')) {
    return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}

try {
    $notity = $notification->createNotification($message, $userId, $receiverUserId);
    if($notity){
        echo $notity;
    }
    else{
        echo $response->code(400)->toJSON(['error' => "Something went wrong"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
 
    
   