<?php
include('../../server/comment.php');
include('../utilities/response.php');
include('../utilities/request.php');

$comment = new Comment();
$request = new Request(); 
$response = new Response();

$userComment = $request->get("comment");
$postId = $request->get("post_id");
$userId = $request->get("userid");

if(!$request->has('comment') && !$request->has('post_id')  && !$request->has('userid')) {
    return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}

try {
    $commented = $message->addUserComment($userComment, $postId, $userId);
    if($commented){
        echo $response->toJSON($commented);
    }
    else{
       echo $response->code(400)->toJSON(['error' => "Could not comment"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
  