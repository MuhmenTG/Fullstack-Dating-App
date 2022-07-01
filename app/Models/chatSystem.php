<?php
  session_start();
  include("query.php");
  class ChatSystem extends Query {

  public function __construct()
  {
      parent::__construct();
  }

     
    public function getConversationBetweenTwoUsers(int $senderId, int $reciverId)
    {     
      $selectQuery = "SELECT  userChat.*, 
      CONCAT(userInfo1.firstName, ' ', userInfo1.lastName) as nameFrom,
      CONCAT(userInfo2.firstname, ' ', userInfo2.lastname) as nameTo  
      FROM userChat  
      INNER JOIN userInfomation userInfo1 ON :senderId = userInfo1.id
      INNER JOIN userInfomation userInfo2 ON :reciverId = userInfo2.id
      ORDER BY messageTime DESC";
      $data = array(":senderId" => $senderId, ":reciverId" => $reciverId);
      return $this->returnRecordsOfExecutedQuery($selectQuery, $data); 
    }

    public function addNewMessage(int $senderId, int $reciverId, int $message)
    {
      $insertQuery = "INSERT INTO userChat (senderID, receiverID, textMessage) VALUES(:senderID, :receiverID, :textMessage)";
      $data = array(":senderID" => $senderId, ":receiverID" => $reciverId, ":textMessage" => $message);
      return ($this->executeQuery($insertQuery, $data)) ? 1 : 0; 
    }
    
    public function deleteSentMessage(int $senderId, int $reciverId, int $messageId){
      $deleteQuery = "DELETE FROM userChat WHERE senderID = :senderID AND receiverID = :receiverID AND messageID = :messageID";
      $data = array($senderId => ":senderID", $reciverId => ":receiverID", $messageId => ":messageID");
      return $this->executeQuery($deleteQuery, $data);  
    }

   


 
}


 
