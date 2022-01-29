<?php
   include('../server/shop.php');
   
   $shop = new Shop();
   $products = $shop->getAllProducts();
   echo json_encode($products);