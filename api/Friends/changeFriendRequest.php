<?php
include('../../server/friends.php');
$data = json_decode(file_get_contents('php://input'), true);
$friend = new Friends();
$requestId = $data['requestId'];
$userId = $data['userId'];
$friendId = $data['friendId'];
$status = $data["status"];
$result = $friend->changeFriendRequestStatus($requestId, $senderUserId, $receiverId, $status);
if($result){
    echo json_encode(true);
}
else{
    echo json_encode(false);
};