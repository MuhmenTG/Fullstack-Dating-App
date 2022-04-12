<?php
    include('../../server/user.php');
    include('../../vendor/mail.php');
    include('../utilities/request.php');
    include('../utilities/response.php');
 
    $user = new User();
    $request = new Request(); 
    $response = new Response();

    $firstname = $request->get("firstname");
    $lastname = $request->get("lastname");
    $emailaddress = $request->get("emailaddress");
    $password = $request->get("password");
    $gender = $request->get("gender");

    if(!$request->has('firstname') && !$request->has('lastname') && !$request->has('emailaddress') && !$request->has('password') && !$request->has('gender')) {
        return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
    }

    try {
        $token = bin2hex(openssl_random_pseudo_bytes(8));
        $userRegister = $user->registerUser($firstname, $lastname, $emailaddress, $password, $gender, $token);
        if($userRegister == 1){
            $message = "Hi from PHP mailer". "<a href='http://localhost:8888/RistaByMuhmen/client/verify.php?token=${token}&email=${emailaddress}'>Click here to verify</a>";
            Email::sendMail($emailaddress, 'Thanks for your registration', $message);
        }
        else{
           echo $response->code(400)->toJSON(['error' => "Registration failed"]);
        }
    }  catch(Exception $e) {
        return $response->code($e->code)->toJSON(['error' => $e->message]);
    }
      