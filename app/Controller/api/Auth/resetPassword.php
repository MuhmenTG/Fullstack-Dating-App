<?php
    header('Access-Control-Allow-Origin: *');

    include('../../../Models/auth.php');
    include('../utilities/request.php');
    include('../utilities/response.php');
    include('../../../../sendEmail.php');
  
    $auth = new Auth();
    $request = new Request();
    $response = new Response();
    
    $token = $request->get("token");;
    $regConPassword = $request->get("regConPassword");

    if(!$request->has('token') && !$request->has('regConPassword')) {
        return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
    }

    try{
        $passwordIsUpdated = $auth->updatePassword($regConPassword, $token);
        if($passwordIsUpdated){        
            echo $response->toJSON(['msg' => "Password reset", "code" => 200]);
        }
        else{
            echo false;
        }
    }  
    catch(Exception $e) 
    {
       return $response->code(500)->toJSON(['error' => $e->message]);
    }