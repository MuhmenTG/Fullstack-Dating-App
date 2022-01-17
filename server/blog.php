<?php
    session_start();
  //  $userID = $_SESSION['id'];
    include("inc/config.php");

    class Blog extends Database {
    private $db;
    private $userID;
    public function __construct()
    {
        parent::__construct();
        if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
            $this->userID = $_SESSION['id'];
        }
        $this->db=$this->connect();
    }

    public function getAllBlogs()
    {
        $selectQuery = "SELECT b.id, b.heading, b.shortDescription, b.longDescription, b.createdDate, 
        u.firstName, u.lastName
        from blog b, userInfomation u
        WHERE b.userId = u.id";  
        return $this->fetchRecords($selectQuery);
        /* $selectStatement = $this->db->prepare($selectQuery);  
            $selectStatement->execute();
            $dataResult = $selectStatement->fetchAll();   
            return $dataResult;*/                              

    }

    public function searchBetweenBlogs($name)
    {
        $selectQuery = "SELECT b.id, b.heading, b.shortDescription, b.longDescription, b.createdDate, 
        u.firstName, u.lastName
        from blog b, userInfomation u
        WHERE b.userId = u.id AND u.firstName LIKE :firstName";
        return $this->fetchRecords($selectQuery, ":firstName", '%'.$name.'%');
        /*$selectStatement = $this->db->prepare($selectQuery);  
        $selectStatement->execute([":firstName" =>  '%'.$name.'%']);
        $dataResult = $selectStatement->fetchAll();   
        return $dataResult;*/
    }

    public function specificCommentRecord($tableName, $column, $id)
    {
        $selectQuery = "SELECT c.commentMessage, c.id, c.userId, c.postId, u.firstName, c.date FROM 
        ( 
            SELECT * FROM commentsToBlog WHERE postId = :id
        ) AS c
        INNER JOIN userInfomation AS u
        ON u.id = c.userId";
        return $this->fetchRecords($selectQuery, ":id" ,$id);
       
    }

    public function specificBlogRecord($id)
    {
        $selectQuery = "SELECT b.id, b.heading, b.shortDescription, b.longDescription, b.createdDate, 
        u.firstName, u.lastName
        from blog b, userInfomation u
        WHERE b.userId = u.id AND b.id = ?";          
        return $this->fetchRecords($selectQuery, ":id" ,$id);
    }

    private function fetchRecords($selectQuery, $key = "", $value = ""){
        if(empty($key) && empty($value)){
            $selectStatement = $this->db->prepare($selectQuery);  
            $selectStatement->execute();
            $dataResult = $selectStatement->fetchAll();   
            return $dataResult;
        }
        else{
            $selectStatement = $this->db->prepare($selectQuery);  
            //$selectStatement->execute([$id]);
            $selectStatement->execute([$key => $value]);
            $dataResult = $selectStatement->fetchAll();   
            return $dataResult;  
        }

    }
        
    



}


     
 
?>