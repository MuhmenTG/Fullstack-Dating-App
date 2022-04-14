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
        $selectQuery = "SELECT firstName, lastName, gender, userInfomation.id FROM userInfomation INNER JOIN notifications ON notifications.userToNotify = userInfomation.id AND notifications.userToNotify = :userToNotify AND notifications.isViewed = 0";
        $data = array(":userToNotify" => $userId);
        return $this->returnExecutedQueryRecord($selectQuery, $data); 
    }
}


     
