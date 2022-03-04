<?php 
    include('../server/user.php');
    session_start();
    $data = json_decode(file_get_contents('php://input'), true);
    $key = $data["key"]; 
    $value = $data["value"];
    $userId = $data["userId"]; 
    $user = new User();
    $updated = $user->completeAndEditProfileInfo($key, $value, $userId);
    if($updated){
       echo true;
    }
    else{
        echo false;
    }