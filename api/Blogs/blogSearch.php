<?php
include('../../server/blog.php');
include('../utilities/request.php');
include('../utilities/response.php');

$blog = new Blog();
$request = new Request(); 
$response = new Response();

$authorName = $request->get("name");
if(!$request->has('name')) {
    return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
}

try{
    $search = $blog->getBlogs($authorName);
    if($search){
      echo $response->toJSON($search);
    }
    else{
      echo $response->code(400)->toJSON(['error' => "We could not find any matching posts"]);
    }
}  
catch(Exception $e) 
{
   return $response->code($e->code)->toJSON(['error' => $e->message]);
}
   
  