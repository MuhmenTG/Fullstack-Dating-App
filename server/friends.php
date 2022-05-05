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


    public function changeFriendRequestStatus($requestId, $status)
    {
        $updateQuery = "UPDATE friends SET 
        acceptenceStatus = :acceptenceStatus WHERE id = :requestId";
        $data = array(":acceptenceStatus" => $status, ":requestId" => $requestId);
        return $this->executeQuery($updateQuery, $data);
    }

    public function deleteSentFriendRequest($requestId){
         
        $deleteQuery = "DELETE FROM friends WHERE id = :requestId";
        $data = array(":requestId" => $requestId);
        return $this->executeQuery($deleteQuery, $data);
    }
 
    public function getOutgoingFriendRequests($userId)
    {
        $selectQuery = "SELECT friends.id AS requestId, userInfomation.firstName, userInfomation.lastname, userInfomation.id FROM userInfomation INNER JOIN friends ON userInfomation.id = friends.id WHERE friends.acceptenceStatus = :acceptenceStatus AND friends.senderId = :senderId";
        $data = array(":acceptenceStatus" => "pending", ":senderId" => $userId);
        return $this->returnExecutedQueryRecord($selectQuery, $data); 
    }

    public function getIncomingFriendRequests($userId){ 
        $selectQuery = "SELECT friends.id AS requestId, friends.receiverId AS receiverId,friends.acceptenceStatus, userInfomation.firstName, userInfomation.lastname, userInfomation.id FROM userInfomation INNER JOIN friends ON userInfomation.id = friends.id
        WHERE friends.acceptenceStatus = :acceptenceStatus AND receiverId = :senderId";
        $data = array(":acceptenceStatus" => "pending", ":senderId" => $userId);
        return $this->returnExecutedQueryRecord($selectQuery, $data); 
    }

    public function changeLike($userId, $receiverId){

        $selectQuery = "SELECT * FROM likes WHERE likedBy = :likedBy AND liked = :liked";
        $likeData = array(":likedBy" => $userId, ":liked" => $receiverId);
        $result = $this->returnExecutedQueryRecord($selectQuery, $likeData);
        ((count($result) > 0)) ? $SqlQuery = "DELETE FROM likes WHERE likedBy = :likedBy AND liked = :liked" :  $SqlQuery = "INSERT INTO likes (likedBy, liked) VALUES (:likedBy, :liked)";
        return $this->executeQuery($SqlQuery, $likeData);
    }

    public function getOutgoingLikes($userId)
    {
        $selectQuery = "SELECT firstName, lastname, userInfomation.id FROM userInfomation INNER JOIN likes ON userInfomation.id = likes.likedBy AND likes.liked = :likedBy";
        $data = array(":likedBy" => $userId);
        return $this->returnExecutedQueryRecord($selectQuery, $data); 
    }

    public function getIncomingLikes($userId){
        $selectQuery = "SELECT firstName, lastname, userInfomation.id FROM userInfomation INNER JOIN likes ON userInfomation.id = likes.liked AND likes.likedBy = :liked";
        $data = array(":liked" => $userId);
        return $this->returnExecutedQueryRecord($selectQuery, $data); 
    }

 
}

