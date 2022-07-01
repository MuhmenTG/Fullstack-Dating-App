<?php
    include("query.php");

    class Notification extends Query {
    
    public function __construct()
    {
       parent::__construct();
    }  

    public function createNotification(string $msg, int $receiverUserId, int $userId){
        $insertQuery = "INSERT INTO notifications (msg, userToNotify, userWhoFiredEvent) 
        VALUES(:msg, :userToNotify, :userWhoFiredEvent)";
        $data = array(":msg" => $msg, ":userToNotify" => $userId, ":userWhoFiredEvent" => $receiverUserId);
        return $this->executeQuery($insertQuery, $data); 
    }

    public function getNotificationsByType(int $userId, string $notificationType)
    {
        $selectQueryAllNotifies = "SELECT u.firstName, u.lastName, u.gender, u.id 
        AS userId, notify.msg, notify.id AS notifyId FROM userInfomation AS u INNER JOIN notifications 
        AS notify ON notify.userWhoFiredEvent = u.id AND notify.userToNotify = :userToNotify";
        $data = array(":userToNotify" => $userId);
        if($notificationType == "Read"){
            $selectQueryAllNotifies .=  " ORDER BY notify.id DESC";
            return $this->returnRecordsOfExecutedQuery($selectQueryAllNotifies, $data);
        } 
        else if($notificationType == "Unread"){
            $selectQueryAllNotifies .=  " AND notify.isViewed = 0 AND notify.isShowned = 0 ORDER BY notify.id DESC";
            return $this->returnRecordsOfExecutedQuery($selectQueryAllNotifies, $data); 
        }
    }

    public function updateNotification(int $notficationId)
    {
        $updateQuery = "UPDATE notifications SET isShowned = 1 WHERE id = :id";
        $data = array(":id" => $notficationId);
        return $this->executeQuery($updateQuery, $data); 
    }


}


     

