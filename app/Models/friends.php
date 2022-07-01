<?php
  session_start();
  include("query.php");
    class Friends extends Query {

    public function __construct()
    {
        parent::__construct();
    }

    public function sendFriendRequest(int $userId, int $requestToUser)
    {
        $selectQuery = "SELECT * FROM friends WHERE senderId = :senderUserId AND receiverId = :receiverId AND acceptenceStatus = :acceptenceStatus";
        $isExistData = array(":senderUserId" => $userId, ":receiverId" => $requestToUser, ":acceptenceStatus" => "pending");
        $result = $this->returnRecordsOfExecutedQuery($selectQuery, $isExistData);
        if(count($result) > 0)
        {
            return -1;
        }
        else{
            
            $insertQuery = "INSERT INTO friends (senderId, receiverId) VALUES(:senderId, :receiverId)";
            $data = array(":senderId" => $userId, ":receiverId" => $requestToUser);
            return ($this->executeQuery($insertQuery, $data)) ? 1 : 0; 
        }
    }

    public function changeFriendRequestStatus(int $requestId, string $status)
    {
        $updateQuery = "UPDATE friends SET acceptenceStatus = :acceptenceStatus WHERE id = :requestId";
        $data = array(":acceptenceStatus" => $status, ":requestId" => $requestId);
        return $this->executeQuery($updateQuery, $data);
    }

    public function deleteSentFriendRequest(int $requestId){
        $deleteQuery = "DELETE FROM friends WHERE id = :requestId";
        $data = array(":requestId" => $requestId);
        return $this->executeQuery($deleteQuery, $data);
    }
 
    public function getOutgoingFriendRequests(int $userId)
    {
        $selectQuery = "SELECT friends.id AS requestId, userInfomation.firstName, userInfomation.lastname, userInfomation.id FROM userInfomation INNER JOIN friends ON userInfomation.id = friends.id WHERE friends.acceptenceStatus = :acceptenceStatus AND friends.senderId = :senderId";
        $data = array(":acceptenceStatus" => "pending", ":senderId" => $userId);
        return $this->returnRecordsOfExecutedQuery($selectQuery, $data); 
    }

    public function getIncomingFriendRequests(int $userId){ 
        $selectQuery = "SELECT friends.id AS requestId, friends.receiverId AS receiverId,friends.acceptenceStatus, userInfomation.firstName, userInfomation.lastname, userInfomation.id FROM userInfomation INNER JOIN friends ON userInfomation.id = friends.id WHERE friends.acceptenceStatus = :acceptenceStatus AND receiverId = :senderId";
        $data = array(":acceptenceStatus" => "pending", ":senderId" => $userId);
        return $this->returnRecordsOfExecutedQuery($selectQuery, $data); 
    }

    public function changeLike(int $userId, int $receiverId){
        $selectQuery = "SELECT * FROM likes WHERE likedBy = :likedBy AND liked = :liked";
        $likeData = array(":likedBy" => $userId, ":liked" => $receiverId);
        $result = $this->returnRecordsOfExecutedQuery($selectQuery, $likeData);
        ((count($result) > 0)) ? $SqlQuery = "DELETE FROM likes WHERE likedBy = :likedBy AND liked = :liked" :  $SqlQuery = "INSERT INTO likes (likedBy, liked) VALUES (:likedBy, :liked)";
        return $this->executeQuery($SqlQuery, $likeData);
    }

    public function getOutgoingLikes(int $userId)
    {
        $selectQuery = "SELECT firstName, lastname, userInfomation.id FROM userInfomation INNER JOIN likes ON userInfomation.id = likes.likedBy AND likes.liked = :likedBy";
        $data = array(":likedBy" => $userId);
        return $this->returnRecordsOfExecutedQuery($selectQuery, $data); 
    }

    public function getIncomingLikes(int $userId){
        $selectQuery = "SELECT firstName, lastname, userInfomation.id FROM userInfomation INNER JOIN likes ON userInfomation.id = likes.liked AND likes.likedBy = :liked";
        $data = array(":liked" => $userId);
        return $this->returnRecordsOfExecutedQuery($selectQuery, $data); 
    }

    public function getOnlineUsers(int $userId){
        $selectQuery = "SELECT friends.id, friends.acceptenceStatus, userInfomation.firstName, userInfomation.lastName, userInfomation.isLoggedIn FROM friends INNER JOIN userInfomation ON friends.id = userInfomation.id WHERE friends.senderId = :userId AND friends.acceptenceStatus = :acceptenceStatus";
        $data = array(":userId" => $userId, ":acceptenceStatus" => "accepted");
        return $this->returnRecordsOfExecutedQuery($selectQuery, $data); 
    }

    public function getLikedUsers(int $userId)
    {
        $selectQuery = "SELECT * FROM likes where likedBy = :userId";  
        $data = array(":userId" => $userId);    
        return $this->returnRecordsOfExecutedQuery($selectQuery, $data);
    }

    public function getFriendRequestedUser(int $userId){
        $selectQuery = "SELECT * FROM friends where senderId = :senderId";
        $isFriendDataExist = array(":senderId" => $userId);
        $result = $this->returnRecordsOfExecutedQuery($selectQuery, $isFriendDataExist);
        if((count($result) > 0)){
            return $result;
        }
        else{
            return false;
        }
    }

    


   

 
}

