<?php
include('../../../Models/comment.php');
include('../utilities/request.php');
include('../utilities/response.php');

$comment = new Comment();
$request = new Request(); 
$response = new Response();

$message = $request->get("message");
$commentId = $request->get("commentId");

if(!$request->has('message') && !$request->has('commentId')) {
    return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}

try {
    $updatedComment = $comment->editUserComment($message, $commentId);
    if($updatedComment){
        echo $response->code(200)->toJSON([$updatedComment]);
    }
    else{
       echo $response->code(400)->toJSON(['error' => "Could not edit comment"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
  
