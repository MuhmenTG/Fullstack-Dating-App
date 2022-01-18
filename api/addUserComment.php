<?php
    include('../server/comment.php');
    $data = json_decode(file_get_contents('php://input'), true);
    //$email = $data['email'];
    //$number = $data['number'];
    $comment = $data['comment'];
    $post_id = $data['post_id'];
    $user_id = $data['userid'];
    $message = new Comment();
    $userComment =  $message->addUserComment(
        $comment,
        $post_id,
        $user_id
    );
    if($userComment){
        echo true;
    }
    else{
        echo false;
    }



    
