<?php
    include('../../../Models/user.php');
    include('../utilities/request.php');
    include('../utilities/response.php');
    include('../../../../vendor/mail.php');

    $user = new User();
    $request = new Request(); 
    $response = new Response();

    $newPassword = $request->get("newPassword");
    $token = $request->get("token");
    $email = $request->get("email");

    if(!$request->has('newPassword') && !$request->has('token') && !$request->has('email')) {
        return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
    }


    try{
        $passwordIsUpdated = $user->updatePassword(
        $newPassword,
        $token,
        $email);
        $message = "Your password has been sent!";
        if($passwordIsUpdated){        
            echo true;
            Email::sendMail($email, 'Password is reset!', $message);
        }
        else{
            echo false;
        }
    }  
    catch(Exception $e) 
    {
       return $response->code($e->code)->toJSON(['error' => $e->message]);
    }
       
      

   
  