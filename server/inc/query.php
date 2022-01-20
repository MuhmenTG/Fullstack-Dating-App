<?php
include("config.php");
class Query extends Database  
{
    protected function __construct()
    {
        parent::__construct();
    }

    protected function fetchRecords($selectQuery, $key = "", $value = ""){
        $selectStatement = $this->connect()->prepare($selectQuery);  
        (empty($key) && empty($value)) ? $selectStatement->execute() : $selectStatement->execute([$key => $value]);
        $dataResult = $selectStatement->fetchAll();   
        return $dataResult; 
    }
    
    protected function insertRecord($insertQuery, $data){
        $insertStatement = $this->connect()->prepare($insertQuery);
        foreach($data as $key => &$value) {    
            $insertStatement->bindParam($key, $value);
        }
        $executeQuery = $insertStatement->execute();
        return ($executeQuery)? true : false;
    }
    
}
