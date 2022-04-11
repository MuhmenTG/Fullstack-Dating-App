<?php
    session_start();
    include("inc/query.php");

    class Blog extends Query {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getBlogs($searchParams = NULL)
    {
        $paramType = gettype($searchParams);
        $selectQuery = "SELECT b.id, b.userId, b.heading, b.shortDescription, b.longDescription, b.createdDate, 
        u.firstName, u.lastName, u.id
        from blog b, userInfomation u
        WHERE b.userId = u.id";
        switch ($paramType) {
            case 'NULL':
                return $this->fetchRecords($selectQuery);
                break;
            case 'string':
                $selectQuery .= " AND u.firstName LIKE :firstName";
                return $this->fetchRecords($selectQuery, ":firstName", '%'.$searchParams.'%');
                break;
            default:
                return;
        }
    }

    public function getSpecificBlog($searchParams = NULL)
    {
        
        $selectQuery = "SELECT b.id, b.userId, b.heading, b.shortDescription, b.longDescription, b.createdDate, 
        u.firstName, u.lastName, u.id
        from blog b, userInfomation u
        WHERE b.userId = u.id AND b.id = :id";
        return $this->fetchRecords($selectQuery, ":id", $searchParams);
    }


    public function specificCommentRecord($tableName, $column, $id)
    {
        $selectQuery = "SELECT c.commentMessage, c.id, c.userId, c.postId, u.firstName, c.date FROM 
        ( 
            SELECT * FROM commentsToBlog WHERE postId = :id
        ) AS c
        INNER JOIN userInfomation AS u
        ON u.id = c.userId";
        return $this->fetchRecords($selectQuery, ":id", $id);
    }


}


     
 
?>