<?php
session_start();
include('../server/user.php');
$data = json_decode(file_get_contents('php://input'), true);
$email = $data['email'];
$userPassword = $data['userPassword'];
$userObjct = new User();

if ($userLogin = $userObjct->login($email, $userPassword)) {

    //Separate concerns, don't manage sessions in your database models
    $_SESSION['email'] = $email;
    $_SESSION['id'] = $userLogin['id'];

    // Give a valid feedback for the client
    echo json_encode(['loggedIn' => true]);
    exit;
}

// Add a HTTP 401 header and a proper respoosne for the client
header("HTTP/1.1 401 Unauthorized");
echo json_encode(['loggedIn' => false]);