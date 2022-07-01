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
        $verifed = $auth->verifyUser($token, $email);
        if($verifed){
            echo $response->toJSON(['msg' => "Verification success", "code" => 200]);
            $message = "Hello new member, your profile has been verified";
            Email::sendMail($email, 'Succesfull - Profile verified', $message);
        }
        else{
            echo $response->toJSON(['msg' => "Something went wrong", "code" => 400]);
        }
    }  catch(Exception $e) {
        $response->code(500)->toJSON(['msg' => $e->getCode()]);
    }
     
        
       