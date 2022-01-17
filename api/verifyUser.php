<?php
    include('../server/user.php');
    include('../vendor/mail.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $token = $data['token']; 
    $userObject = new User();
    $verifed = $userObject->verifyUser(
        $token    
    );
    if($verifed)
    {
        echo true;
    }
    else{
        echo false;
    }
    