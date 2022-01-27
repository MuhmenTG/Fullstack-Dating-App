<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    include('../vendor/mail.php');
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
    $message = "Your password has been sent!";
    if($passwordIsUpdated){        
        echo true;
        Email::sendMail($email, 'Password is reset!', $message);
    }
    else{
        echo false;
    }