<?php
include('../../server/blog.php');
include('../utilities/response.php');
include('../utilities/request.php');

$blog = new Blog();
$request = new Request(); 
$response = new Response();

$blogID = $request->get("blogID");

if(!$request->has('blogID')) {
    return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}


try {
    $specificBlog = $blog->getSpecificBlog($blogID); 
    $getLatestPost = $blog->getBlogs();
    $specificComments = $blog->specificCommentRecord("commentsToBlog", 'postId', $blogID);
    $result = array($specificBlog, $getLatestPost, $specificComments);
    if($result){
        echo $response->toJSON($result);
    }
    else{
       echo $response->code(400)->toJSON(['error' => "Could not find blog"]);
    }
}  catch(Exception $e) {
    return $response->code($e->code)->toJSON(['error' => $e->message]);
}
 
