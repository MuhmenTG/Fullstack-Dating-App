<?php


    include('../../server/user.php');
    include('../utilities/response.php');
    include('../utilities/request.php');

    $user = new User();
    $request = new Request(); 
    $response = new Response();


    $gender = $request->get('gender'); 
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
        $userMatchesResult = $user->advancedSeachRequest(
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
            if($userMatchesResult && $userId){
                $likedUsers = $user->getLikedUsers($userId);
                $friendUsers = $user->getFriendRequestedUser($userId);
                $userMatchesResult = array($userMatchesResult);

                $result = array($userMatchesResult, $likedUsers, $friendUsers); 

                echo $response->toJSON($result);
            }
            else{
                return false;
            }
        
    }  
    catch(Exception $e) {
        return $response->code($e->code)->toJSON(['error' => $e->message]);
    }
     
