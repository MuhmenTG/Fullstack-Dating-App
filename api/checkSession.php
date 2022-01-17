<?php 
    session_start();
    if(!empty($_SESSION['id']) && !empty($_SESSION['email']))
    {
        echo json_encode(true);
    }
    else{
        echo json_encode(false);
    }
    
