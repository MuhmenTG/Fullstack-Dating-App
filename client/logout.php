<?php
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['id']);
    session_destroy();
    session_write_close();
    header('Location: index.php');
