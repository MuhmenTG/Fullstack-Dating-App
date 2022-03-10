<?php
include('../../server/friends.php');
$data = json_decode(file_get_contents('php://input'), true);
$friend = new Friends();
$UserId = $data['userId'];
$result = $friend->getOutgoingFriendRequests($UserId);
if($result){

}
else{
    
}