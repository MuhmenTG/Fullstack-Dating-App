<?php
  session_start();
  include("inc/query.php");
    class Friends extends Query {

    public function __construct()
    {
        parent::__construct();
    }

    public function sendFriendRequest($senderUserId, $receiverId)
    {
    
        $selectQuery = "SELECT * FROM friends WHERE senderId = :senderUserId AND receiverId = :receiverId AND acceptenceStatus = :acceptenceStatus";
        $isExistData = array("senderUserId" => $senderUserId, "receiverId" => $receiverId, ":acceptenceStatus" => "pending");
        $result = $this->isRecord($selectQuery, $isExistData);
      /*  if(count($result) > 0)
        {
            return -1;
        }
        else{
            
            $insertQuery = "INSERT INTO friends (senderId, receiverId) 
            VALUES(:senderId, :receiverId)";
            $data = array(":senderId" => $senderUserId, ":receiverId" => $receiverId);
            return ($this->executeQuery($insertQuery, $data)) ? 1 : 0; 
        }*/
    }
 

    public function acceptFriendRequest($senderId, $receiverId)
    {
        $updateQuery = "UPDATE friends SET 
        acceptenceStatus = :acceptenceStatus  WHERE AND senderId = :senderUserId AND receiverId = :receiverId";
        $data = array(":acceptenceStatus" => "Friends", ":senderUserId" => $senderId, ":receiverId" => $receiverId);
        return $this->executeQuery($updateQuery, $data);
    }
 

    public function cancelFriendRequest($senderId, $receiverId)
    {
        $deleteQuery = "DELETE FROM friends WHERE acceptenceStatus = :acceptenceStatus AND senderId = :senderUserId AND receiverId = :receiverId"; 
        $data = array(":acceptenceStatus" => "pending", ":senderUserId" => $senderId, ":receiverId" => $receiverId);
        return $this->executeQuery($deleteQuery, $data); 
    }
 
    public function unFriendFriendship($senderId, $receiverId)
    {
        $deleteQuery = "DELETE FROM friends WHERE acceptenceStatus = :acceptenceStatus AND senderId = :senderUserId AND receiverId = :receiverId
        OR acceptenceStatus = :acceptenceStatus AND senderId = :receiverId AND receiverId = :senderUserId";
        $data = array(":acceptenceStatus" => "Friends", ":senderUserId" => $senderId, ":receiverId" => $receiverId);
        return $this->executeQuery($deleteQuery, $data); 
    }

    public function blockUser($senderId, $receiverId)
    {
        $insertQuery = "INSERT INTO friends (senderId, receiverId, acceptenceStatus ) 
        VALUES(:senderId, :receiverId, :acceptenceStatus)";
        $data = array(":senderId" => $senderId, ":receiverId" => $receiverId, ":acceptenceStatus" => "Blocked");
        return ($this->executeQuery($insertQuery, $data)) ? 1 : 0; 
    }

    public function getOutgoingFriendRequests($userId)
    {
        $selectQuery = "SELECT 
        firstName, 
        lastname,
        userInfomation.id
        FROM 
        userInfomation
        INNER JOIN
        friends
        ON userInfomation.id = friends.receiverId
        WHERE friends.acceptenceStatus =  :acceptenceStatus AND friends.senderId = :senderId";
        $data = array(":acceptenceStatus" => "pending", ":senderId" => $userId);
        return $this->isRecord($selectQuery, $data); 
    }

    public function getIncomingFriendRequests($userId){
        $selectQuery = "SELECT 
        firstName, 
        lastname,
        userInfomation.id
        FROM 
        userInfomation
        INNER JOIN
        friends
        ON userInfomation.id = friends.senderId
        WHERE friends.acceptenceStatus =  :acceptenceStatus AND friends.receiverId = :senderId";
        $data = array(":acceptenceStatus" => "pending", ":senderId" => $userId);
        return $this->isRecord($selectQuery, $data); 
    }

 
}

