<?php
    include('../server/user.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    $data = json_decode(file_get_contents('php://input'), true);
    $loggedInUser = $data['loggedInUser'];
    $userPreferenceGender = $data['userPreferenceGender'];
    $userLocation = $data['userLocation'];
    $userAge = $data['userAge'];
    $userHeight = $data['userHeight'];
    $userWeight = $data['userWeight'];
    $userMaximumEducation = $data['userMaximumEducation'];
    $userReligion = $data['userReligion'];
    $userMaritalStatus = $data['userMaritalStatus'];
    $userSmokingStaus = $data['userSmokingStaus'];
    $userDrinkingStatus = $data['userDrinkingStatus'];
    $userParentStatus = $data['userParentStatus'];
    $userEyeColor = $data['userEyeColor'];
    $userHairColor = $data['userHairColor'];
    $userClothingStyle = $data['userClothingStyle'];
    $userLivingStyle = $data['userLivingStyle'];
    $userObjct = new User();
    $profileIsUpdated = $userObjct->completeAndEditProfileInfo(
    $loggedInUser,
    $userPreferenceGender,
    $userLocation,
    $userAge,
    $userHeight,
    $userWeight,
    $userMaximumEducation,
    $userReligion,
    $userMaritalStatus,
    $userSmokingStaus,
    $userDrinkingStatus,
    $userParentStatus,
    $userEyeColor,
    $userHairColor,
    $userClothingStyle,
    $userLivingStyle);
    if($profileIsUpdated){        
        echo 1;
    }
    else{
        echo 2;
    }
    
    
