<?php
include('../../server/comment.php');
include('../utilities/response.php');
include('../utilities/request.php');

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
    if($isDeleted){
        echo $response->toJSON([$updatedComment]);
    }
    else{
       echo $response->code(400)->toJSON(['error' => "Could not delete comment"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
  
