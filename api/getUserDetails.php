<?php
    include('../server/user.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $userId = $data['key'];
    $userObject = new User();
    $userResult = $userObject->getProfileInfomation($userId);
    echo json_encode($userResult);
