<?php
include('../../server/friends.php');
include('../utilities/request.php');
include('../utilities/response.php');
 
$request = new Request(); 
$response = new Response();
$friend = new Friends(); 
$requestId = $request->get("requestId");
$status = $request->get("status");
if(!$request->has('requestId') || !$request->has('status')) {
    return $response->code(400).toJSON(['error' => 'Missing some input from you.']);
}

try {
    if($status == "delete"){
        $result = $friend->deleteSentFriendRequest($requestId);
        $response = ($result) ?  $response->toJSON(['success' => 'Friend request deleted']) : $response->code(400).toJSON(['error' => "friend request deleted"]);
        return $response;
    }
    else{
        $result = $friend->changeFriendRequestStatus($requestId, $status);
        $response = ($result) ? $response->toJSON(['success' => 'Friend request '.$request->get("status") ]) : $response->code(400).toJSON(['error' => "friend request unsuccesfull"]);
        return $response;
    }
} catch(Exception $e) {
    return $response->code($e->code).toJSON(['error' => $e->message]);
}
 