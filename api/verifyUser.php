<?php
    include('../server/user.php');
    include('../vendor/mail.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $token = $data['token']; 
    $emailaddress = $data['email'];
    $userObject = new User();
    $verifed = $userObject->verifyUser(
        $token    
    );
    if($verifed)
    {
        echo true;
        $message = "Hello new member, your profile has been verified";
        Email::sendMail($emailaddress, 'Succesfull - Profile verified', $message);
    }
    else{
        echo false;
        $message = "Hello new member, your profile has not been verified";
        Email::sendMail($emailaddress, 'Account verification unsuccesful', $message);
    }
    
    