<?php 
    include('../server/user.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $gender = $data["gender"]; 
    $preference = $data['preference'];
    $location = $data['location'];
    $minAge = $data['minAge'];
    $maxAge = $data['maxAge'];
    $minHeight = $data['minHeight'];
    $maxHeight = $data['maxHeight'];
    $minWeight = $data['minWeight'];
    $maxWeight = $data['maxWeight'];
    $education = $data['education'];
    $maxAge = $data['maxAge'];
    $work = $data['work'];
    $maritalStatus = $data['maritalStatus'];
    $smokingStatus = $data['smokingStatus'];
    $drinkingStatus = $data['drinkingStatus'];

    $userObj = new User();
    $userMatchesResult = $userObj->advancedSeachRequest(
    $gender,
    $preference,
    $location,
    $minAge,
    $maxAge,
    $minHeight,
    $maxHeight,    
    $minWeight,
    $maxWeight,    
    $education,
    $work,
    $maritalStatus,
    $smokingStatus,
    $drinkingStatus
    );
    if($userMatchesResult){
        echo $userMatchesResult;
    }
    else{
        return false;
    }
