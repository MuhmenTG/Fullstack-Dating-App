<?php
    header('Access-Control-Allow-Origin: *');
    include('../../../Models/auth.php');
    include('../utilities/request.php');
    include('../utilities/response.php');
    include('../../../../sendEmail.php');


    $auth = new Auth();
    $request = new Request(); 
    $response = new Response();
 
    $regEmail = $request->get("regEmail");

    if(!$request->has('regEmail')) {
        return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
    }

    
    try{
        $resetDate = time();
        $expiryDate = strtotime('15 minutes', $resetDate);
        $token = bin2hex(openssl_random_pseudo_bytes(8));
        $isSendLink = $auth->resetPasswordSetToken(
            $regEmail,
            $token,
            $resetDate,
            $expiryDate
        );
        switch ($isSendLink) {
            case 1:
                echo $response->toJSON(['msg' => "User found and email triggered", "code" => 200]);
                $resetLink = 
                "Hello member! Forgot your password? To reset your password please follow the link below:If you suspect someone may have unauthorised access to your account, we suggest you change your password as a precaution by visiting your profile
                <a href=http://localhost:3000/resetForgottenPassword/${token}>Click To Reset password</a>";
                Email::sendMail($regEmail, 'Instructions to reset your Password', $resetLink);    
                break;
            case -1:
                echo $response->toJSON(['msg' => "No user found", "code" => 300]);
                break;
            default:
                break;
            }      
    }  
    catch(Exception $e) 
    {
       return $response->code($e->code)->toJSON(['error' => $e->message]);
    }






   