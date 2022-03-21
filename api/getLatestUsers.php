<?php
    include('../server/user.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $userObjct = new User();
    $userId = $data['userId'];
    $showlatestUsers = $userObjct->getUsers();
    if($userId){
        $likedUsers = $userObjct->getLikedUsers($userId);
        $result = array($likedUsers, $showlatestUsers);
    }
    else{
        $result = $showlatestUsers;
    }
    echo json_encode($result);