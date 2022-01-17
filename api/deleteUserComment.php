<?php
    include('../server/comment.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $commentId = $data['commentId'];
    $userId = $data['userId'];
    $comment = new Comment();
    $isDeleted =  $comment->deleteUserComment(
       $commentId,
       $userId
    );
    if($isDeleted){
        echo true;
    }
    else{
        echo false;
    }



   
