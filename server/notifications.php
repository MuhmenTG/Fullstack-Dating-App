<?php
    include("inc/query.php");

    class Notification extends Query {
    
    public function __construct()
    {
       parent::__construct();
    }

    public function createNotification($msg, $receiverUserId, $userId){
        $insertQuery = "INSERT INTO notifications (msg, userToNotify, userWhoFiredEvent) 
        VALUES(:msg, :userToNotify, :userWhoFiredEvent)";
        $data = array(":msg" => $msg, ":userToNotify" => $userId, ":userWhoFiredEvent" => $receiverUserId);
        return $this->executeQuery($insertQuery, $data); 
    }

    public function getNotifications($userId){
        $selectQuery = "SELECT userInfomation.id as Id, firstName, lastName, gender FROM userInfomation INNER JOIN notifications WHERE notifications.userToNotify = :userInfomation.id AND notifications.isViewed = 0";
        $data = array(":acceptenceStatus" => "pending", ":senderId" => $userId);
        return $this->returnExecutedQueryRecord($selectQuery, $data); 
    }
}


     
