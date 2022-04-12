<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);exit;
include('../../server/user.php');
include('../../vendor/mail.php');
include('../utilities/request.php');
include('../utilities/response.php');

$user = new User();
$request = new Request(); 
$response = new Response();

    $token = $request->get("token");
    $emailaddress = $request->get("email");
    
    if(!$request->has('token') || !$request->has('email')) {
        return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
    }
    
    try {
        $verifed = $user->verifyUser($token);
        if($verifed){
            echo $response->toJSON([$verifed]);
            $message = "Hello new member, your profile has been verified";
            Email::sendMail($emailaddress, 'Succesfull - Profile verified', $message);
        
        }
        else{
            echo $response->code(400)->toJSON(['error' => "Something went wrong"]);
            $message = "Hello new member, your profile has not been verified";
            Email::sendMail($emailaddress, 'Account verification unsuccesful', $message);
        }
    }  catch(Exception $e) {
        return $response->code($e->code)->toJSON(['error' => $e->message]);
    }
     
        
       