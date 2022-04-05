<?php
include('../../server/friends.php');
include('../utilities/request.php');
include('../utilities/response.php');
 

$friend = new Friends();
$request = new Request(); 
$response = new Response();

$userId = $request->get("id");
if(!$request->has('id')) {
    return $response->code(400).toJSON(['error' => 'Missing some input from you.']);
}

try {
    $getIncomingFriendRequests = $friend->getIncomingFriendRequests($userId);
    $getOutgoingFriendRequests = $friend->getOutgoingFriendRequests($userId);
    $result = array($getIncomingFriendRequests, $getOutgoingFriendRequests);
    if($result){
        echo $response->toJSON($result);
    }
    else{
       echo $response->code(400).toJSON(['error' => "You don't have any requests"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code).toJSON(['error' => $e->message]);
}
 
