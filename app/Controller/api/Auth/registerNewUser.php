<?php
    header('Access-Control-Allow-Origin: *');

    include('../../../Models/auth.php');
    include('../utilities/request.php');
    include('../utilities/response.php');
    include('../../../../sendEmail.php');

    $auth = new Auth();
    $request = new Request(); 
    $response = new Response();

    $regFirstName = $request->get("regFirstName");
    $regLastName = $request->get("regLastName");
    $regEmail = $request->get("regEmail");
    $regConPassword = $request->get("regConPassword");
    $regGender = $request->get("regGender");


    if(!$request->has('regFirstName') && !$request->has('regLastName') && !$request->has('regEmail') && !$request->has('regConPassword') && !$request->has('regGender')) {
        return $response->code(400)->toJSON(['msg' => 'Missing some input from you.']);
    }


    try {
        $token = bin2hex(openssl_random_pseudo_bytes(8));
        $userRegister = $auth->registerUser($regFirstName, $regLastName, $regEmail, $regConPassword, $regGender, $token);
        if($userRegister == 1){
            echo $response->toJSON(['msg' => "Registration success", "code" => 200]);
            $message = "Hello new member. Please use the following link ". "<a `href=http://localhost:3000/verification/${token}/${regEmail}>Click here to verify</a>";
            Email::sendMail($regEmail, "Account Verification", $message);
        }
        elseif($userRegister == -1){
            echo $response->toJSON(['msg' => "User already registered", "code" =>300]);
        }
        else{
           return $response->code(400)->toJSON(['msg' => "Registration failed"]);
        }
    }  catch(Exception $e) {
        $response->code(500)->toJSON(['msg' => $e->getCode()]);
    }
      