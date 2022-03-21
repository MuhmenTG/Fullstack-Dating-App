<?php
    include('../server/user.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $userObjct = new User();
    $userId = $data['userId'];
    $receiverId = $data['receiverId'];
    $liked = $userObjct->addLikePerson($userId, $receiverId);
    if($liked){
        echo json_encode($liked);
    }
    else{
        echo json_decode(false);   
    }
   