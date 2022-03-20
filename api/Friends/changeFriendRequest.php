<?php
include('../../server/friends.php');
$data = json_decode(file_get_contents('php://input'), true);
$friend = new Friends();
$requestId = $data['requestId'];
$status = $data["status"];
if($status == "delete"){
  
    $result = $friend->deleteSentFriendRequest($requestId);
}   
else{
    $result = $friend->changeFriendRequestStatus($requestId, $status);
}
if($result){
    echo json_encode(true);
}
else{
    echo json_encode(false);
};