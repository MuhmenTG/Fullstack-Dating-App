<?php
session_start();
include('../server/user.php');
include('../vendor/mail.php');
$data = json_decode(file_get_contents('php://input'), true);

$userEmail = $data['userEmail'];
$userId = $data['userId'];
$user = new User();
$suspended = $user->suspendUserAcount($userId);
if($suspended){
    $message = "Your Profile has been suspended";
    Email::sendMail($userEmail, 'Your Profile is suspended', $message);
}
else{
    echo false;
}