<?php
    include('../server/blog.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $blogID = $data['blogID'];
    $blog = new Blog();
    $specificBlog = $blog->getBlogs($blogID); 
    $getLatestPost = $blog->getBlogs();
    $specificComments = $blog->specificCommentRecord("commentsToBlog", 'postId', $blogID);
    $results = array($specificBlog, $getLatestPost, $specificComments);
    echo json_encode($results);
