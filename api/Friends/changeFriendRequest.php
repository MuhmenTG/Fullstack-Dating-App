<?php
include('../../server/friends.php');
include('../utilities/request.php');
include('../utilities/response.php');
 
$request = new Request(); 
$response = new Response();
$friend = new Friends(); 
$request->get("requestId");
$request->get("status");
if(!$request->has('requestId') || !$request->has('status')) {
    return $response->code(400).toJSON(['error' => 'Missing some input from you.']);
}

try {
    if($request->get('status') == "delete"){
        $result = $friend->deleteSentFriendRequest($request->has('requestId'));
        return ($result) ? $response->toJSON(['success' => 'Friend request deleted']) : $response->code(400).toJSON(['error' => "friend request deleted"]);
    }
    else{
        $result = $friend->changeFriendRequestStatus($request->has('requestId'), $request->has('status'));
        return ($result) ? $response->toJSON(['success' => 'Friend request '.$request->get("status") ]) : $response->code(400).toJSON(['error' => "friend request unsuccesfull"]);
    }
} catch(Exception $e) {
    return $response->code($e->code).toJSON(['error' => $e->message]);
}
 