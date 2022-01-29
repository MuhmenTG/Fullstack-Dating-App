<?php
    include('../server/shop.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $productId = $data['productId']; 
    $shop = new Shop();
    $product = $shop->getSpeficProduct($productId);
    echo $product;exit;
    echo json_encode($product);