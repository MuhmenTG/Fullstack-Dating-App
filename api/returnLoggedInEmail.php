<?php 
    session_start();
    if(!empty($_SESSION['id']) && !empty($_SESSION['email']))
    {
        echo $_SESSION['email'];
    }