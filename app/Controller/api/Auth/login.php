<?php
    session_start();
    include('../../../Models/auth.php');
    include('../utilities/request.php');
    include('../utilities/response.php');

    $auth = new Auth();
    $request = new Request(); 
    $response = new Response();

    $email = $request->get("email");
    $userPassword = $request->get("userPassword");

    if(!$request->has('email') && !$request->has('userPassword')) {
        return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
    }

    try{
        $userLogin = $auth->login($email, $userPassword);
        if($userLogin){
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $userLogin;
            if(isset($_SESSION['email']) && isset($_SESSION['id']))
            {
                echo true;
            }
        }
        else {
            echo false;
        }
    }  
    catch(Exception $e) 
    {
       return $response->code($e->code)->toJSON(['error' => $e->message]);
    }

   
  