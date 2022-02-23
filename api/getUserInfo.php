<?php
session_start();
   include('../server/user.php');
   $data = json_decode(file_get_contents('php://input'), true);
   $userId = $data['id'];
   $userObject = new User();
   $userResult = $userObject->getUserInfo($userId);
   echo json_encode($userResult);
