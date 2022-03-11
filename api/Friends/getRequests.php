<?php
include('../../server/friends.php');
$data = json_decode(file_get_contents('php://input'), true);
$friend = new Friends();
$UserId = $data['id'];
$getIncomingFriendRequests = $friend->getIncomingFriendRequests($UserId);
$getOutgoingFriendRequests = $friend->getOutgoingFriendRequests($UserId);
$result = array($getIncomingFriendRequests, $getOutgoingFriendRequests);
echo json_encode($result);