<?php
    include('../../../Models/user.php');
    include('../../../Models/friends.php');
    include('../utilities/request.php');
    include('../utilities/response.php');

    $user = new User();
    $friend = new Friends();
    $request = new Request(); 
    $response = new Response();

    $userId = $request->get("userId");

    if(!$request->has('userId')) {
        return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
    }

    try{
        if($userId){
            $likedUsers = $friend->getLikedUsers($userId);
            $friendUsers = $friend->getFriendRequestedUser($userId);
            $getUsers = $user->getUsers();
            $result = array($likedUsers, $getUsers, $friendUsers);
        }
        else{
            $result = $getUsers;
        }
        echo $response->toJSON($result);
    }  
    catch(Exception $e) 
    {
       return $response->code($e->code)->toJSON(['error' => $e->message]);
    }
       
      



   