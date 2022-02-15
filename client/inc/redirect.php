<?php
session_start();
if(!isset($_SESSION['email']) && !isset($_SESSION['id']))
{
    header('Location: index.php?isLoggedOut=true');
}