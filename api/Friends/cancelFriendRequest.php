<?php
include('../../server/friends.php');
$data = json_decode(file_get_contents('php://input'), true);
$friend = new Friends();
$senderUserId = $data['userId'];
$receiverId = $data['receiverId'];
$result = $friend->cancelFriendRequest($senderUserId, $receiverId);
if($result){

}
else{
    
}