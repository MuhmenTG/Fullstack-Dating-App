<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    header('Access-Control-Allow-Origin: *');

    include('../../../Models/auth.php');
    include('../utilities/request.php');
    include('../utilities/response.php');
    include('../../../../sendEmail.php');

    $auth = new Auth();
    $request = new Request(); 
    $response = new Response();

    $token = $request->get("token");

    if(!$request->has('token')) {
        return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
    }
    
    try {
        $checkExpiry = $auth->checkExpiryDateResetToken($token);
        if($checkExpiry){
            echo $response->toJSON(['msg' => "Link is valid", "code" => 200]);
        }
        else{
            echo $response->toJSON(['msg' => "Link expired", "code" => 401]);
        }
    }  catch(Exception $e) {
        $response->code(500)->toJSON(['msg' => $e->getCode()]);
    }
     
        
       