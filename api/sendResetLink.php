<?php
    include('../server/user.php');
    include('../vendor/mail.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $email = $data['email'];
    $token = bin2hex(openssl_random_pseudo_bytes(8));
    $userObject = new User();
    $userObject->resetPasswordSetToken(
        $email,
        $token    
    );
    $resetLink = 
    "Hello member! As per your request, we hereby send you a link to reset
    <a href='http://localhost:8888/RistaByMuhmen/client/forgot_password.php?token={$token}&email={$email}'>Click To Reset password</a>";
    Email::sendMail($email, 'Instructions to reset your Password', $resetLink);
   
