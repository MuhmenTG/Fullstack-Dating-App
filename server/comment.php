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

    public function addUserComment(
    $comment,
    $post_id,
    $user_id)
    {
        $insertQuery = "INSERT INTO commentsToBlog (userId, postId, commentMessage) 
        VALUES(:userId, :postId, :commentMessage)";
        $insertStatement = $this->db->prepare($insertQuery);
        $insertStatement->bindParam(":userId", $user_id); 
        $insertStatement->bindParam(":postId", $post_id); 
        $insertStatement->bindParam(":commentMessage", $comment); 
        $executeQuery = $insertStatement->execute(); 
        if($executeQuery){
            echo true;
        }
        else{
            echo false;
        }
    } 

    public function deleteUserComment($commentId,
    $userId){
        $deleteQuery = "DELETE FROM commentsToBlog WHERE id = ? AND userId = ?"; 
        $deleteStatement = $this->db->prepare($deleteQuery);
        $executeQuery = $deleteStatement->execute([$commentId, $userId]);
        if($executeQuery){
            echo true;
        }
        else{
            echo false;
        }
     
    }

    public function editUserComment($message, $commentId)
    {
        $updateQuery = "UPDATE commentsToBlog SET 
        commentMessage = :commentMessage
        WHERE id = :id"; 
        $updateQuery = $this->db->prepare($updateQuery);
        $updateQuery->bindParam(':commentMessage', $message);
        $updateQuery->bindParam(':id', $commentId);
        $executeQuery = $updateQuery->execute();
        if($executeQuery){
            echo true;
        }
        else{
            echo false;
        }
    }

    public function editUserComments($message, $commentId)
    {
        $updateQuery = "UPDATE commentsToBlog SET 
        commentMessage = :commentMessage
        WHERE id = :id"; 
        $updateQuery->bindParam(':commentMessage', $message);
        $updateQuery->bindParam(':id', $commentId);
        $executeQuery = $updateQuery->execute();
        if($executeQuery){
            echo true;
        }
        else{
            echo false;
        }
    }

    private function executeQuery($query, $key = "", $value = ""){
        $statement = $this->db->prepare($query);
        for ($i=0; $i < $params.length; $i++) { 
            $statement->bindParam($key[i], $value[i]);
        }
  
        (empty($key) && empty($value)) ? $statement->execute() : $statement->execute([$key => $value]);
        $dataResult = $statement->fetchAll();   
        return $dataResult; 
    }
} 