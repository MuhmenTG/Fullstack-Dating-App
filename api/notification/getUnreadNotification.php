<?php
include('../../server/notifications.php');
include('../utilities/request.php');
include('../utilities/response.php');
     
$notification = new Notification();
$request = new Request(); 
$response = new Response();

$userId = $request->get("id");
if(!$request->has('id')) {
    return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}

try {
    $getNotification = $notification->getNotificationsByType($userId, "Unread");
   
    if($getNotification){
        echo $response->code(200)->toJSON($getNotification);
    }
    else{
        echo $response->code(400)->toJSON(['error' => "Something went wrong"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
 
    
   