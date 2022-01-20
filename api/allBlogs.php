<?php
   include('../server/blog.php');
   $blog = new Blog();
   $blogs = $blog->getBlogs();
   echo json_encode($blogs);