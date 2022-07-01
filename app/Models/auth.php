<?php
  
  include("query.php");
    class Auth extends Query {
    
    public function __construct()
    {
        parent::__construct();
    }
        
    public function login($email, $userPassword )
    {     
        $result = $this->isRecordExits('userPassword, id', 'userInfomation', 'email', $email, true);  
        if(!$result){ 
            return false; 
        }
        if(password_verify($userPassword, $result['userPassword']))
        {     
            $this->changeLoggedInStatus($result['id']);
            return $result['id'];
        }
        else{
            return false;
        }
    }

    public function registerUser(string $firstName, string $lastName, string $emailaddress, string $password, string $gender, string $token)
    {
        $result = $this->isRecordExits('email', 'userInfomation', 'email', $emailaddress);
        if($result)
        {
            return -1;
        }
        else{
            $insertQuery = "INSERT INTO userInfomation (firstName, lastName, email, userPassword, gender, verifyToken) 
            VALUES(:firstName, :lastName, :email, :userPassword, :gender, :verifyToken)";
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $registrationDetails = array(":firstName" => $firstName, ":lastName" => $lastName, ":email" => $emailaddress, ":userPassword" => $hashPassword, ":gender" => $gender, ":verifyToken" => $token);
            return ($this->executeQuery($insertQuery, $registrationDetails)) ? 1 : 0; 
        }
        
    }    
    
    public function verifyUser(string $token, string $email) : bool
    {
        $updateQuery = "UPDATE userInfomation SET 
        isVerified = 1 WHERE verifyToken = :verifyToken AND email = :email";
        $data = array(":verifyToken" => $token, ":email" => $email);
        return $this->executeQuery($updateQuery, $data);
    }

    public function checkVerification(string $token, string $email) : array
    {
        $selectQuery = "SELECT id FROM userInfomation WHERE verifyToken = :verifyToken AND email = :email AND isVerified = 1";
        $data = array(":verifyToken" => $token, ":email" => $email);
        $result = $this->returnRecordsOfExecutedQuery($selectQuery, $data);
        if(count($result) > 0){
            return $result;
        }
        else{
            return false;
        }
    }

    public function checkExpiryDateResetToken(string $token) : bool
    {
        $currentTime = time();
        $selectQuery = "SELECT id FROM resetPassword WHERE token = :token AND :currentDate BETWEEN resetDate AND expiryDate";
        $data = array(":token" => $token, ":currentDate" => $currentTime);
        $result = $this->returnRecordsOfExecutedQuery($selectQuery, $data);
        return (count($result) > 0) ? $result : false;
    }
        
    public function resetPasswordSetToken(string $email, string $token, int $resetDate, int $expireDate)
    {
        $result = $this->isRecordExits('email, id', 'userInfomation', 'email', $email);
        if($result) 
        {
            $userId = $result["id"];
            $insertQuery = "INSERT INTO resetPassword (userId, resetDate, expiryDate, token) 
            VALUES(:userId, :resetDate, :expiryDate, :token)";
            $data = array(":userId" => $userId, ":resetDate" => $resetDate, ":expiryDate" => $expireDate, ":token" => $token);
            return $this->executeQuery($insertQuery, $data) ? 1 : 0;
        }
        else{
           return -1;         
        } 
    } 

    public function updatePassword(string $newPassword, string $token) : bool{
        $userDataToken = $this->isRecordExits("token, userId", "resetPassword", "token", $token); 
        if($userDataToken){
            $userId = $userDataToken["userId"];
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateQuery = "UPDATE userInfomation SET 
            userPassword = :userPassword
            WHERE id = :id";
            $data = array(":userPassword" => $newPasswordHash, ":id" => $userId);
            return $this->executeQuery($updateQuery, $data);
        }
        else{
            return false;
        }
    }

    public function changeLoggedInStatus(int $userId) : bool
    {
        $updateQuery = "UPDATE userInfomation SET 
        isLoggedIn = :isLoggedIn WHERE id = :userId";
        $data = array(":isLoggedIn" => "online", ":userId" => $userId);
        return $this->executeQuery($updateQuery, $data);
    }

 
}


