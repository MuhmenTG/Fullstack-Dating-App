<?php

session_start();
$userID = $_SESSION['id'];
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include("inc/config.php");
?>

<?php


class Comment extends Database {

    public $db;
    public $userID;
    public function __construct()
    {
        parent::__construct();
        if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
            $this->userID = $_SESSION['id'];
        }
        $this->db=$this->connect();   
    }

    public function addUserComment($comment, $post_id, $user_id)
    {
        $insertQuery = "INSERT INTO commentsToBlog (userId, postId, commentMessage) 
        VALUES(:userId, :postId, :commentMessage)";
        $data = array(":userId" => $user_id, ":postId" => $post_id, ":commentMessage" => $comment);
        return $this->executeQuery($insertQuery, $data); 
    } 

    public function deleteUserComment($commentId, $userId){
        $deleteQuery = "DELETE FROM commentsToBlog WHERE id = :id AND userId = :userId"; 
        $data = array(":id" => $commentId, ":userId" => $userId);
        return $this->executeQuery($deleteQuery, $data); 
    }

    public function editUserComment($message, $commentId)
    {
        $updateQuery = "UPDATE commentsToBlog SET 
        commentMessage = :commentMessage
        WHERE id = :id"; 
        $data = array(":commentMessage" => $message, ":id" => $commentId);
        return $this->executeQuery($updateQuery, $data); 
    }

    private function executeQuery($query, $data){
        $statement = $this->db->prepare($query);
        foreach($data as $key => &$value) {    
            $statement->bindParam($key, $value);
        }
        $executeQuery = $statement->execute();
        if($executeQuery){
            echo true;
        }
        else{
            echo false;
        }
    }
} 