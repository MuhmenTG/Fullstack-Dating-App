<?php
include('../../../Models/comment.php');
include('../utilities/request.php');
include('../utilities/response.php');


$comment = new Comment();
$request = new Request(); 
$response = new Response();

$commentId = $request->get("commentId");
$userId = $request->get("userId");


if(!$request->has('commentId') && !$request->has('userId')) {
    return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}

try {
    $isDeleted =  $comment->deleteUserComment($commentId, $userId);    
    if($isDeleted){
        echo $response->toJSON([$isDeleted]);
    }
    else{
       echo $response->code(400)->toJSON(['error' => "Could not delete comment"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
  

  
   
