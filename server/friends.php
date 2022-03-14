<?php
  session_start();
  include("inc/query.php");
    class Friends extends Query {

    public function __construct()
    {
        parent::__construct();
    }

    public function sendFriendRequest($userId, $requestToUser)
    {
    
        $selectQuery = "SELECT * FROM friends 
        WHERE senderId = :senderUserId 
        AND receiverId = :receiverId 
        AND acceptenceStatus = :acceptenceStatus";
        $isExistData = array(":senderUserId" => $userId, ":receiverId" => $requestToUser, ":acceptenceStatus" => "pending");
        $result = $this->returnExecutedQueryRecord($selectQuery, $isExistData);
        if(count($result) > 0)
        {
            return -1;
        }
        else{
            
            $insertQuery = "INSERT INTO friends (senderId, receiverId) 
            VALUES(:senderId, :receiverId)";
            $data = array(":senderId" => $userId, ":receiverId" => $requestToUser);
            return ($this->executeQuery($insertQuery, $data)) ? 1 : 0; 
        }
    }

    public function changeFriendRequestStatus($requestId, $senderId, $receiverId, $status)
    {
        $updateQuery = "UPDATE friends SET 
        acceptenceStatus = :acceptenceStatus WHERE id = :requestId";
        $data = array(":acceptenceStatus" => $status, ":requestId" => $requestId);
        return $this->executeQuery($updateQuery, $data);
    }
 
    public function getOutgoingFriendRequests($userId)
    {
        $selectQuery = "SELECT friends.id AS requestId, firstName, lastname, userInfomation.id FROM userInfomation INNER JOIN friends ON userInfomation.id = friends.receiverId
        WHERE friends.acceptenceStatus =  :acceptenceStatus AND friends.senderId = :senderId";
        $data = array(":acceptenceStatus" => "pending", ":senderId" => $userId);
        return $this->returnExecutedQueryRecord($selectQuery, $data); 
    }

    public function getIncomingFriendRequests($userId){
        $selectQuery = "SELECT friends.id AS requestId, friends.acceptenceStatus AS friendStatus, firstName, lastname, userInfomation.id FROM userInfomation INNER JOIN friends ON userInfomation.id = friends.senderId
        WHERE friends.acceptenceStatus =  :acceptenceStatus AND friends.receiverId = :senderId";
        $data = array(":acceptenceStatus" => "pending", ":senderId" => $userId);
        return $this->returnExecutedQueryRecord($selectQuery, $data); 
    }

 
}

