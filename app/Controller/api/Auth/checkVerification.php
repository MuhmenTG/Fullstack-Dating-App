<?php
    header('Access-Control-Allow-Origin: *');

    include('../../../Models/auth.php');
    include('../utilities/request.php');
    include('../utilities/response.php');
    include('../../../../sendEmail.php');

    $auth = new Auth();
    $request = new Request(); 
    $response = new Response();

    $token = $request->get("token");
    $email = $request->get("email");
    
    if(!$request->has('token') || !$request->has('email')) {
        return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
    }
    
    try {
        $checkVerification = $auth->checkVerification($token, $email);
        if($checkVerification){
            echo $response->toJSON(['msg' => "Your already verfied", "code" => 200]);
        }
        else{
            echo $response->toJSON(['msg' => "Something went wrong", "code" => 400]);
        }
    }  catch(Exception $e) {
        $response->code(500)->toJSON(['msg' => $e->getCode()]);
    }
     
        
       