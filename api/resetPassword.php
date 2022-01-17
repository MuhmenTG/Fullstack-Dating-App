<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    include('../server/user.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $newPassword = $data['newPassword'];
    $token = $data['token'];
    $email = $data['email']; 
    $userObject = new User();
    $passwordIsUpdated = $userObject->updatePassword(
    $newPassword,
    $token,
    $email);
    if($passwordIsUpdated){        
        return true;
    }
    else{
        return false;
    }