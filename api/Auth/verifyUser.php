<?php
    include('../server/user.php');
    include('../vendor/mail.php');
    $data = json_decode(file_get_contents('php://input'), true);
    $token = $data['token']; 
    $emailaddress = $data['email'];
    $userObject = new User();
    $verifed = $userObject->verifyUser(
        $token    
    );
    if($verifed)
    {
        echo true;
        $message = "Hello new member, your profile has been verified";
        Email::sendMail($emailaddress, 'Succesfull - Profile verified', $message);
    }
    else{
        echo false;
        $message = "Hello new member, your profile has not been verified";
        Email::sendMail($emailaddress, 'Account verification unsuccesful', $message);
    }
    
    

    include('../server/user.php');
    include('../vendor/mail.php');
    include('../utilities/request.php');
    include('../utilities/response.php');
         
        
    $friend = new Friends();
    $request = new Request(); 
    $response = new Response();
    
    
    $token = $request->get("token");
    $email = $request->get("email");
    
    if(!$request->has('token') || !$request->has('email')) {
        return $response->code(400)->toJSON(['error' => 'Missing some input from you.']);
    }
    
    try {
        $liked = $friend->changeLike($userId, $receiverId);
        if($liked){
            echo $response->toJSON($result);
        }
        else{
            echo $response->code(400)->toJSON(['error' => "Something went wrong"]);
        }
    }  catch(Exception $e) {
        return $response->code($e->code)->toJSON(['error' => $e->message]);
    }
     
        
       