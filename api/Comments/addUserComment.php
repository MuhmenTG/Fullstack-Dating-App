<?php
include('../../server/comment.php');
include('../utilities/response.php');
include('../utilities/request.php');

$comment = new Comment();
$request = new Request(); 
$response = new Response();

$userComment = $request->get("comment");
$postId = $request->get("blogId");
$userId = $request->get("userId");

if(!$request->has('comment') && !$request->has('blogId')  && !$request->has('userId')) {
    return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}

try {
    $commented = $comment->addUserComment($userComment, $postId, $userId);
    if($commented){
        echo $response->code(200)->toJSON([$commented]);
    }
    else{
       echo $response->code(400)->toJSON(['error' => "Could not comment"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
  