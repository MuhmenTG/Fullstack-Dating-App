<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
    include('../server/inc/query.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $emailaddress = $data['email'];
    $query = new Query();
    $userIdExist = $query->isRecordExits('email', 'userInfomation', 'email', $emailaddress);
    if($userIdExist < 0)
    {
        echo "No found"; 
    }
    else{
        echo json_encode($userIdExist);
    }