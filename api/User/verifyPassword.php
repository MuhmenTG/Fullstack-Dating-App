<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    include('../server/user.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $currentPassword = $data['currentPassword'];
    $sessionId = $data['sessionId'];
      