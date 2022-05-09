<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    include('../../server/user.php');
    include('../utilities/response.php');
    include('../utilities/request.php');

    $user = new User();
    $request = new Request(); 
    $response = new Response();


    $preference = $request->get('preference');
    $location = $request->get('location');
    $minAge =  $request->get('minAge');
    $maxAge =  $request->get('maxAge');
    $minHeight = $request->get('minHeight');
    $maxHeight = $request->get('maxHeight');
    $minWeight = $request->get('minWeight');
    $maxWeight = $request->get('maxWeight');
    $education = $request->get('education');
    $work =  $request->get('work');
    $maritalStatus = $request->get('maritalStatus');
    $smokingStatus = $request->get('smokingStatus');
    $drinkingStatus = $request->get('drinkingStatus');
    $userId =  $request->get('userId');
    try {
            if($userId){
                $likedUsers = $user->getLikedUsers($userId);

                $friendUsers = $user->getFriendRequestedUser($userId);
                $userMatchesResult = $user->advancedSeachRequest(
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
                $result = array($likedUsers, $userMatchesResult, $friendUsers); 

                echo $response->toJSON($result);
            }
            else{
                return false;
            }
        
    }  
    catch(Exception $e) {
        return $response->code($e->code)->toJSON(['error' => $e->message]);
    }
     
