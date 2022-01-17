<?php
   include('../server/blog.php');
   $blog = new Blog();
   $blogs = $blog->getAllBlogs();
   echo json_encode($blogs);