<?php 
    session_start();
    include('../../server/user.php');
    include('../utilities/response.php');
    include('../utilities/request.php');

    $user = new User();
    $request = new Request(); 
    $response = new Response();

    $key = $request->get("key");
    $value = $request->get("value");
    $userId = $request->get("userId");
 
    if(!$request->has('key') && !$request->has('value') && !$request->has('userId')) {
        return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
    }
 

    try {
        $updated = $user->completeAndEditProfileInfo($key, $value, $userId);
        if($updated){
            echo $response->code(200)->toJSON([true]);
        }
        else{
            echo $response->code(400)->toJSON(['error' => "Could not edit profile"]);
        }
    }  catch(Exception $e) {
        return $response->code($e->code)->toJSON(['error' => $e->message]);
    }
      