<?php
include('../../server/blog.php');
include('../utilities/request.php');
include('../utilities/response.php');

$blog = new Blog();
$request = new Request(); 
$response = new Response();


try{
   $blogs = $blog->getBlogs();
   if($blogs){
      echo $response->toJSON($blogs);
   }
   else{
      echo $response->code(400)->toJSON(['error' => "You don't have any requests"]);
   }
}  
catch(Exception $e) 
{
   return $response->code($e->code)->toJSON(['error' => $e->message]);
}
   
  