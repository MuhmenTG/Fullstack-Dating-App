<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');

    include('../../../Models/user.php');
    include('../utilities/request.php');
    include('../utilities/response.php');
    include('../../../../vendor/mail.php');


    $user = new User();
    $request = new Request(); 
    $response = new Response();

    $regFirstName = $request->get("regFirstName");
    $regLastName = $request->get("regLastName");
    $regEmail = $request->get("regEmail");
    $regConPassword = $request->get("regConPassword");
    $regGender = $request->get("regGender");


    if(!$request->has('regFirstName') && !$request->has('regLastName') && !$request->has('regEmail') && !$request->has('regConPassword') && !$request->has('regGender')) {
        return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
    }

    try {
        $token = bin2hex(openssl_random_pseudo_bytes(8));
        $userRegister = $user->registerUser($regFirstName, $regLastName, $regEmail, $regConPassword, $regGender, $token);
        if($userRegister == 1){
            $message = "Hi from PHP mailer". "<a href='http://localhost:8888/RistaByMuhmen/client/verify.php?token=${token}&email=${regEmail}'>Click here to verify</a>";
            Email::sendMail($regEmail, 'Thanks for your registration', $message);
        }
        else{
           echo $response->code(400)->toJSON(['error' => "Registration failed"]);
        }
    }  catch(Exception $e) {
        $response->code($e->code)->toJSON(['error' => $e->getMessage()]);
    }
      