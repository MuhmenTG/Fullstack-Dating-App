<?php

    class Database
    {
        private  $db_host;      
        private  $db_user;        
        private  $db_password;    
        private  $db_name;        
    
        protected function __construct($db_host = "localhost", $db_user = "root", $db_password = "root", $db_name = "datingPanel")
        {   
            $this->db_host = $db_host;
            $this->db_user = $db_user;
            $this->db_password = $db_password;
            $this->db_name = $db_name;
        }

        protected function connect()
        {   
            try
            {
                $dataSourceName = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;
                $db = new PDO ($dataSourceName, $this->db_user, $this->db_password);
                $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return $db;
            }
            catch(PDOException $e)
            {
                echo "faild: " .$e->getMessage();
            }
        }
    }
?>