<?php
    include('../server/user.php');
    $userObjct = new User();
    $showlatestUsers = $userObjct->getUsers();
    echo json_encode($showlatestUsers);