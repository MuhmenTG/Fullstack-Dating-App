<?php
include('../../../Models/friends.php');
include('../utilities/request.php');
include('../utilities/response.php');


$friend = new Friends();
$request = new Request(); 
$response = new Response();

$userId = $request->get("userId");
if(!$request->has("userId")) {
    return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}

try {
    $online = $friend->getOnlineUsers($userId);
    if($online){
        echo $response->toJSON($online);
    }
    else{
       echo $response->code(400)->toJSON(['error' => "Nobody found"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
 
