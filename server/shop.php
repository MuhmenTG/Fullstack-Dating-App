<?php
  session_start();
  include("inc/query.php");
    class Shop extends Query {
        public function __construct()
        {
            parent::__construct();
        }
    
        public function getAllProducts(){
            $selectQuery = "SELECT * FROM products";                                
            return $this->fetchRecords($selectQuery); 
        }

        public function getSpeficProduct($productId){
            $selectQuery = "SELECT * FROM products WHERE productId = :productId";
            return $this->fetchRecords($selectQuery, ":productId", $productId);       
        }
}


