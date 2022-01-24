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
    
    protected function executeQuery($query, $data){
        $statement = $this->connect()->prepare($query);
        foreach($data as $key => &$value) {    
            $statement->bindParam($key, $value);
        }
        $executeQuery = $statement->execute();
        return ($executeQuery)? true : false;
    }
    
    protected function isRecordExits($recordSelect, $table, $colmn, $param)
    {
        
        $selectQuery = "SELECT $recordSelect FROM $table WHERE $colmn = :params"; 
        $row = $this->fetchRecords($selectQuery, ":params", $param); 
        return (count($row) > 0) ? 1 : 0;
    }
}
