<?php
include('../../../Models/notifications.php');
include('../utilities/request.php');
include('../utilities/response.php');


$notification = new Notification();
$request = new Request(); 
$response = new Response();

$userId = $request->get("notificationId");
if(!$request->has("notificationId")) {
    return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}

try {
    $updateNotfication = $notification->updateNotification($userId);
    
    if($updateNotfication){
        echo $response->code(200)->toJSON([$updateNotfication]);
    }
    else{
        echo $response->code(400)->toJSON(['error' => "Something went wrong"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
 
    
   