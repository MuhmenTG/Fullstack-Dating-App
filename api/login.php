<?php
    session_start();
    include('../server/user.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $email = $data['email'];
    $userPassword = $data['userPassword'];
    $userObjct = new User();
    $userLogin = $userObjct->login(
    $email,
    $userPassword 
    );
    switch ($userLogin) {
        case 1:
            echo 1;
            break;
        case 2:
            echo 2;
            break;
        case 3:
            echo 3;
            break;
        default:
            break;
    }
    