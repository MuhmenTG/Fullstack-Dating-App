<?php
session_start();
include("query.php");


class Comment extends Query {

    public $userID;
    public function __construct()
    {
        parent::__construct();
    }

    public function addUserComment(string $comment, int $postId, int $userId) : bool
    {
        $insertQuery = "INSERT INTO commentsToBlog (userId, postId, commentMessage) 
        VALUES(:userId, :postId, :commentMessage)";
        $data = array(":userId" => $userId, ":postId" => $postId, ":commentMessage" => $comment);
        return $this->executeQuery($insertQuery, $data); 
    } 

    public function deleteUserComment(int $commentId, int $userId) : bool{
        $deleteQuery = "DELETE FROM commentsToBlog WHERE id = :id AND userId = :userId"; 
        $data = array(":id" => $commentId, ":userId" => $userId);
        return $this->executeQuery($deleteQuery, $data); 
    }

    public function editUserComment(string $message, int $commentId) : bool
    {
        $updateQuery = "UPDATE commentsToBlog SET commentMessage = :commentMessage WHERE id = :id"; 
        $data = array(":commentMessage" => $message, ":id" => $commentId);
        return $this->executeQuery($updateQuery, $data); 
    }
} 