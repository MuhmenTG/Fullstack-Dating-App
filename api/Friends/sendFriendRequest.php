<?php
include('../../server/friends.php');
$data = json_decode(file_get_contents('php://input'), true);
$friend = new Friends();
$userId = $data['id'];
$requestToUserId = $data['receiverUserId'];
$request = $friend->sendFriendRequest($userId, $requestToUserId);
switch($request){
    case -1:
      echo -1;
        break;
    case 1:
        echo 1;
        break;
    default:
        break;
}