<?php
  session_start();
  include("inc/query.php");
    class ShopManager extends Query {
        public function __construct()
        {
            parent::__construct();
        }
    
        public function getAllProducts(){
            $selectQuery = "SELECT * FROM products";                                
            return $this->returnRecordsOfExecutedQuery($selectQuery);
        }

        public function getSpeficProduct($productId){
            $selectQuery = "SELECT * FROM products WHERE productId = :productId";
            $data = array(":productId" => $productId);
            return $this->returnRecordsOfExecutedQuery($selectQuery, $data); 
        }

        public function addToCart(){
           
        }
        
}


