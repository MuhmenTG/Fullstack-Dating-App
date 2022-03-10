<?php
include("databaseConfig.php");
class Query extends Database  
{
    protected function __construct()
    {
        parent::__construct();
    }

    protected function fetchRecords($selectQuery, $key = "", $value = ""){
        $selectStatement = $this->connect()->prepare($selectQuery);  
        if(!empty($key) && !empty($value)){
            $selectStatement->bindParam($key, $value);
            $selectStatement->execute();
        } 
        else
        {
            $selectStatement->execute();
        }
        $dataResult = $selectStatement->fetchAll();   
        return $dataResult; 
    }

    protected function fetchRecord($selectQuery, $key = "", $value = ""){
        $selectStatement = $this->connect()->prepare($selectQuery);  
        if(!empty($key) && !empty($value)){
            $selectStatement->bindParam($key, $value);
            $selectStatement->execute();
        } 
        else
        {
            $selectStatement->execute();
        }
        $dataResult = $selectStatement->fetch();   
        return $dataResult; 
    }
     
    protected function executeQuery($query, $data){
        $statement = $this->connect()->prepare($query);
        foreach($data as $key => &$value) {    
            $statement->bindParam($key, $value);
        }
        $executeQuery = $statement->execute();
        return ($executeQuery)? true : false;
    }
    
    protected function isRecordExits($recordSelect, $table, $colmn, $param, $isVerfied = false)
    {
        $selectQuery = "SELECT $recordSelect FROM $table WHERE $colmn = :params";
        ($isVerfied) ? $selectQuery .= " AND isVerified = 1" : null;
        $row = $this->fetchRecord($selectQuery, ":params", $param); 
        return  $row;   
    }

    protected function isRecord($selectQuery, $data)
    {
        $statement = $this->connect()->prepare($selectQuery);
        foreach($data as $key => &$value) {    
            $statement->bindParam($key, $value);
        }
        $statement->execute();
        $dataResult = $statement->fetch();   
        return $dataResult; 
    }

    

    protected function isColumnExits($table, $colmns)
    {
        $showQuery = "SHOW COLUMNS FROM $table LIKE '$colmns'";
        $colmn = $this->fetchRecords($showQuery); 
        return count($colmn);
    }






    
}
