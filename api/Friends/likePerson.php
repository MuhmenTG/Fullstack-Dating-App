<?php
    include('../../server/friends.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $friend = new Friends();
    $userId = $data['id'];
    $receiverId = $data['receiverUserId'];
    $liked = $friend->changeLike($userId, $receiverId);
    if($liked){
        echo json_encode(true);
    }
    else{
        echo json_decode(false);   
    }
   