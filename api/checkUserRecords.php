<?php
    include('../server/user.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $email = $data['email'];
    $user = new User();
    $userIdExist = $user->isRecordExits('id', 'userInfomation', 'email', $email);
    if($userIdExist < 0)
    {
        echo "No found"; 
    }
    else{
        echo json_encode($userIdExist);
    }