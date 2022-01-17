<?php
    include('../server/user.php');
    include('../vendor/mail.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $emailaddress = $data['emailaddress'];
    $password = $data['password'];
    $gender = $data['gender'];
    $token = bin2hex(openssl_random_pseudo_bytes(8));
    $userObjct = new User();
    $userRegister = $userObjct->registerUser(
    $firstname,
    $lastname, 
    $emailaddress,
    $password, 
    $gender,
    $token);
    $message = "Hi from PHP mailer". "<a href='http://localhost:8888/RistaByMuhmen/client/verify.php?token=${token}'>Click here to verify</a>";
    Email::sendMail($emailaddress, 'Thanks for your registration', $message);
    if($userRegister){
        return true;
    }
    else{
        return false;
    }
        
?> 