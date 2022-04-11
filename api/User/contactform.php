<?php
    include('../server/user.php');
    include('../vendor/mail.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $firstName = $data['firstName'];
    $lastName = $data['lastName'];
    $email = $data['email'];
    $number = $data['number'];
    $message = $data['message'];
    $userObjct = new User();
    $contactFormIsSend = $userObjct->contactFormInformation(
    $firstName,
    $lastName, 
    $email,
    $number, 
    $message);
    Email::sendMail($email, 'Thanks for your query. We will get back to you', $message);
    if($contactFormIsSend){
        return true;
    }
    else{
        return false;
    }
        
?> 