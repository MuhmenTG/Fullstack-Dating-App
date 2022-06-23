<?php
include('../../../Models/friends.php');
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
    $liked = $friend->changeLike($userId, $receiverUserId);
   
    if($liked){
        echo $liked;
    }
    else{
        echo $response->code(400)->toJSON(['error' => "Something went wrong"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
 
    
   