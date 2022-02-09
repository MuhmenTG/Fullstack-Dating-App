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
    if($userLogin){
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $userLogin;
        if(isset($_SESSION['email']) && isset($_SESSION['id']))
        {
            echo true;
        }
    }
    else {
       echo false;
    }