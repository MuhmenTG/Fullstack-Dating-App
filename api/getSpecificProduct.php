<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    include('../server/shop.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $productId = $data['productId']; 
    $shop = new Shop();
    $product = $shop->getSpeficProduct($productId);
    echo json_encode($product);