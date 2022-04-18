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
        $selectQuery = "SELECT u.firstName, u.lastName, u.gender, u.id as userId, notify.msg, notify.id as notifyId FROM userInfomation AS u INNER JOIN notifications as notify ON notify.userWhoFiredEvent = u.id AND notify.userToNotify = :userToNotify ORDER BY DES";
        $data = array(":userToNotify" => $userId);
        return $this->returnExecutedQueryRecord($selectQuery, $data); 
    }

    public function getUnreadNotifications($userId){
        $selectQuery = "SELECT u.firstName, u.lastName, u.gender, u.id as userId, notify.msg, notify.id as notifyId FROM userInfomation AS u INNER JOIN notifications as notify ON notify.userWhoFiredEvent = u.id AND notify.userToNotify = :userToNotify AND notify.isViwed = 0";
        $data = array(":userToNotify" => $userId);
        return $this->returnExecutedQueryRecord($selectQuery, $data); 
    }
}


     
