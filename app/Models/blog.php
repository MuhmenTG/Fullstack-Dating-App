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
                return $this->returnRecordsOfExecutedQuery($selectQuery);
                break;
            case 'string':
                $selectQuery .= " AND u.firstName LIKE :firstName";
                $data = array(":firstName" => '%'.$searchParams.'%');
                return $this->returnRecordsOfExecutedQuery($selectQuery, $data);
                break;
            default:
                return;
        }
    }

    public function getSpecificBlog(int $id = NULL) : array
    {
        $selectQuery = "SELECT b.id, b.userId, b.heading, b.shortDescription, b.longDescription, b.createdDate, 
        u.firstName, u.lastName, u.id
        from blog b, userInfomation u
        WHERE b.userId = u.id AND b.id = :id";
        $data = array(":id" => $id);
        return $this->returnRecordsOfExecutedQuery($selectQuery, $data);
    }


    public function specificCommentRecord(int $id) : array
    {
        $selectQuery = "SELECT c.commentMessage, c.id, c.userId, c.postId, u.firstName, c.date FROM 
        ( 
            SELECT * FROM commentsToBlog WHERE postId = :id
        ) 
        AS c
        INNER JOIN userInfomation AS u
        ON u.id = c.userId";
        $data = array(":id" => $id);
        return $this->returnRecordsOfExecutedQuery($selectQuery, $data);
    }
}


     
 
?>