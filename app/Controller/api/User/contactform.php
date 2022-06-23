<?php
    include('../../../Models/user.php');
    include('../utilities/request.php');
    include('../utilities/response.php');

    $user = new User();
    $request = new Request(); 
    $response = new Response();

    $firstName = $request->get('firstName');
    $lastName = $request->get('lastName');
    $email = $request->get('email');
    $number = $request->get('number');
    $message = $request->get('message');

    if(!$request->has('firstName') && !$request->has('lastName') && !$request->has('email') && !$request->has('number') && !$request->has('message')  ) {
        return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
    }

    try{
        $contactFormIsSend = $userObjct->contactFormInformation(
        $firstName,
        $lastName, 
        $email,
        $number, 
        $message);
        Email::sendMail($email, 'Thanks for your query. We will get back to you', $message);
        
    }  
    catch(Exception $e) 
    {
        return $response->code($e->code)->toJSON(['error' => $e->message]);
    }
        
?> 


