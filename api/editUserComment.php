<?php
    include('../server/comment.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $commentId = $data['commentId'];
    $message = $data['message'];
    $comment = new Comment();
    $commentIsUpdated = $comment->editUserComment(
        $message, 
        $commentId
    );
    if($commentIsUpdated){
        echo true;
    }
    else{
        echo false;
    }



   
