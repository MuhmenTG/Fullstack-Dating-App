<?php
include('../../server/friends.php');
include('../utilities/request.php');
include('../utilities/response.php');
     
$friend = new Friends();
$request = new Request(); 
$response = new Response();

$userId = $request->get("id");
$receiverUserId = $request->get("receiverUserId"); 
if(!$request->has('id') || !$request->has('receiverUserId')) {
    return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}

try {
    $friendRequest = $friend->sendFriendRequest($userId, $receiverUserId);
    if($friendRequest == 1  || $friendRequest == -1){
        echo $friendRequest;
    }
    else{
        echo $response->code(400)->toJSON(['error' => "something went wrong"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
 
    
   