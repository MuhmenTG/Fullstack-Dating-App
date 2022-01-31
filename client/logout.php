<?php
session_start();
unset($_SESSION['id']); // Be specific rather than implicit
unset($_SESSION['email']);
// session_destroy() isn't necessary
session_write_close();
header('Location: index.php');