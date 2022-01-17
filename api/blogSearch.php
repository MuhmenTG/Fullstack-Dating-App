<?php
    include('../server/blog.php');   
    $data = json_decode(file_get_contents('php://input'), true);
    $name = $data['name']; 
    $blog = new Blog();
    $search = $blog->searchBetweenBlogs($name);
    echo json_encode($search);
