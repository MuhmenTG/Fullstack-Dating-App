<?php
  session_start();
  include("inc/query.php");
    class User extends Query {

    public function __construct()
    {
        parent::__construct();
    }

     
    public function login($email,
    $userPassword )
    {         
        $result = $this->isRecordExits('*', 'userInfomation', 'email', $email);
        if(!$result){
            return 1;
        }
        if(!password_verify($userPassword, $result['userPassword']))
        {
            return 2;
        }
        $userID = $result['id'];
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $userID;
        if(isset($_SESSION['email']) && isset($_SESSION['id']))
        {
            return 3;
        } 
    }
    

    public function registerUser($firstName, $lastName, $emailaddress, $password, $gender, $token)
    {
        
        if($this->isRecordExits('email', 'userInfomation', 'email', $emailaddress))
        {
            return -1;
        }
        else{
            
            $insertQuery = "INSERT INTO userInfomation (firstName, lastName, email, userPassword, gender, verifyToken) 
            VALUES(:firstName, :lastName, :email, :userPassword, :gender, :verifyToken)";
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $data = array(":firstName" => $firstName, ":lastName" => $lastName, ":email" => $emailaddress, ":userPassword" => $hashPassword, ":gender" => $gender, ":verifyToken" => $token);
            return ($this->executeQuery($insertQuery, $data)) ? 1 : 0; 
        }
     
    }
     
    public function completeAndEditProfileInfo($loggedInUser,
    $userPreferenceGender,
    $userLocation,
    $userAge,
    $userHeight,
    $userWeight,
    $userMaximumEducation,
    $userReligion,
    $userMaritalStatus,
    $userSmokingStaus,
    $userDrinkingStatus,
    $userParentStatus,
    $userEyeColor,
    $userHairColor,
    $userClothingStyle,
    $userLivingStyle){
        try 
        {
            $updateQuery = "UPDATE userInfomation SET 
            userPreferenceGender = :userPreferenceGender, 
            userLocation = :userLocation, 
            userAge = :userAge, 
            userHeight = :userHeight, 
            userWeight = :userWeight, 
            userMaximumEducation = :userMaximumEducation, 
            userReligion = :userReligion, 
            userMaritalStatus = :userMaritalStatus, 
            userSmokingStaus = :userSmokingStaus, 
            userDrinkingStatus = :userDrinkingStatus, 
            userParentStatus = :userParentStatus, 
            userEyeColor = :userEyeColor, 
            userHairColor = :userHairColor, 
            userClothingStyle = :userClothingStyle, 
            userLivingStyle = :userLivingStyle 
            WHERE id = :id ";
            $data = array(
                ':id' => $loggedInUser,
                ':userPreferenceGender' =>  $userPreferenceGender,
                ':userLocation' =>  $userLocation,
                ':userAge' => $userAge,
                ':userHeight' =>  $userHeight,
                ':userWeight' =>  $userWeight,
                ':userMaximumEducation' =>  $userMaximumEducation,
                ':userReligion' =>  $userReligion,
                ':userMaritalStatus' =>  $userMaritalStatus,
                ':userSmokingStaus' =>  $userSmokingStaus,
                ':userDrinkingStatus'  =>  $userDrinkingStatus,
                ':userParentStatus' => $userParentStatus,
                ':userEyeColor' =>  $userEyeColor,
                ':userHairColor' =>  $userHairColor,
                ':userClothingStyle' =>  $userClothingStyle,
                ':userLivingStyle' =>  $userLivingStyle);
            $isUpdate = $this->executeQuery($updateQuery, $data); 
            return ($isUpdate) ? "Your profile has been updated" : "Your profile has not been updated";
         
        }
        catch(Exception $ex){
            echo "<pre>";
            print_r($ex);
            exit();
        }

    }

    public function verifyUser($token)
    {
        $updateQuery = "UPDATE userInfomation SET 
        isVerified = 1 WHERE verifyToken = :verifyToken";
        $data = array(":verifyToken" => $token);
        $this->executeQuery($updateQuery, $data);
    }
        
    public function getProfileInfomation($userId)
    {
        $selectQuery = "SELECT * FROM userInfomation WHERE id = :id";                                
        $data = array(":id" => $userId);
        return $this->executeQuery($insertQuery, $data); 
    }
    
    public function resetPasswordSetToken($email, $token)
    {
        $insertQuery = "INSERT INTO resetPassword (userEmail, token) 
        VALUES(:userEmail, :token)";
        $data = array(":userEmail" => $email, ":token" => $token);
        $this->executeQuery($insertQuery, $data);
    }



    public function getUsers()
    {
        $selectQuery = "SELECT * FROM userInfomation LIMIT 30";                                
        return $this->fetchRecords($selectQuery);
    }

    
    public function logout()
    {
        if(isset($_SESSION['userID']))
        {
            session_destroy();
            return header('Location:./login.php');
        }
    }
        
    public function contactFormInformation($firstName, $lastName, $email, $phone, $messages)
    {
        $insertQuery = "INSERT INTO contactTable (firstName, lastName, email, phone, messages) 
        VALUES(:firstName, :lastName, :email, :phone, :messages)";
        $data = array(":firstName" => $firstName, ":lastName" => $lastName,
        ":email" => $email, ":phone" => $phone, "messages" => $messages );
        $this->executeQuery($insertQuery, $data);
    }      

    public function updatePassword($newPassword, $token, $email){
        $selectQuery = "SELECT * FROM resetPassword WHERE token = :token AND valid = 1";
        $data = array(":token" => $token);
        $executeQuery = $this->executeQuery($selectQuery, $data); 
        if($executeQuery){
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateQuery = "UPDATE userInfomation SET 
            userPassword = :userPassword
            WHERE email = :email";
            $data2 = array(":userPassword" => $newPassword, ":email" => $email);
            return $this->executeQuery($updateQuery, $data2);
        }
        else{
            return false;
        }
    }


   /* public function isRecordExits($recordSelect, $table, $colmn, $param)
    {
        $selectQuery = "SELECT $recordSelect FROM $table WHERE $colmn = :params AND isVerified = 1"; 
        $data = array(":params" => $param);
        return $this->executeQuery($selectQuery, $data); 
    }*/

     
    public function varifyPassword(
    $userID,
    $oldPassword,
    $newPassword)
    {
        $result = $this->isRecordExits("userPassword", "userInfomation", "id", $userID);
        return (password_verify($oldPassword, $result)) ? true : false;
    }

    public function savePassword(
    $userID,
    $oldPassword,
    $newPassword)
    {
        return ($this->varifyPassword($userID, $oldPassword, $newPassword)) ? $this->resetPasswordSettings($newPassword, $userID) : 3;
     
    }
    public function resetPasswordSettings($newPassword, $userId){
        try {
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateQuery = "UPDATE userInfomation SET 
            userPassword = :userPassword
            WHERE id = :id";
            $data = array(":userPassword" => $newPasswordHash, ":id" => $userId);
            $isUpdate = $this->executeQuery($updateQuery, $data); 
            return ($isUpdate) ? 1 : 2;
        }   
        catch(Exception $ex)
        {
            echo "<pre>";
            print_r($ex);
            exit();
        }
    }

    public function advancedSeachRequest(
    $gender,
    $preference,
    $location,
    $minAge,
    $maxAge,
    $minHeight,
    $maxHeight,    
    $minWeight,
    $maxWeight,    
    $education,
    $work, 
    $maritalStatus,
    $smokingStatus,
    $drinkingStatus){
       
        
        $selectQuery = "SELECT * FROM userInfomation WHERE ";
        $selectQuery .= ($gender) ? "gender = :gender" : "";
        $selectQuery .= ($preference) ? " AND userPreferenceGender = :userPreferenceGender" : "";
        $selectQuery .= ($location) ? " AND userLocation = :userLocation" : "";
        $selectQuery .= ($minAge && $maxAge) ? " OR userAge BETWEEN :minAge AND :maxAge " : "";
        $selectQuery .= ($minHeight && $maxHeight) ? " OR userHeight BETWEEN :minHeight AND :maxHeight " : "";
        $selectQuery .= ($minWeight && $maxWeight)  ? " OR userWeight BETWEEN :minWeight AND :maxWeight" : "";
        $selectQuery .= ($education) ? " AND userMaximumEducation = :userMaximumEducation" : "";        
        $selectQuery .= ($smokingStatus) ? " AND userSmokingStaus = :userDrinkingStatus" : "";
        $selectQuery .= ($drinkingStatus) ? " AND userDrinkingStatus = :userDrinkingStatus" : "";
       
        
        try {
            $selectStatement = $this->connect()->prepare($selectQuery);  
            ($gender) ? $selectStatement->bindParam(':gender', $gender) : "";
            ($preference) ? $selectStatement->bindParam(':userPreferenceGender', $preference) : "";
            ($location) ?  $selectStatement->bindParam(':userLocation', $location) : "";
            ($minAge) ? $selectStatement->bindParam(':minAge', $minAge) : "";
            ($maxAge) ? $selectStatement->bindParam(':maxAge', $maxAge) : "";
            ($minHeight) ? $selectStatement->bindParam(':minHeight', $minHeight) : "";
            ($maxHeight) ?  $selectStatement->bindParam(':maxHeight', $maxHeight) : "";
            ($minWeight) ?  $selectStatement->bindParam(':minWeight', $minWeight) : "";
            ($maxWeight) ?  $selectStatement->bindParam(':maxWeight', $maxWeight) : "";
            ($education) ?  $selectStatement->bindParam(':userMaximumEducation', $education) : "";        
            ($smokingStatus) ?  $selectStatement->bindParam(':userSmokingStatus', $smokingStatus) : "";
            ($drinkingStatus) ? $selectStatement->bindParam(':userDrinkingStatus', $drinkingStatus) : "";

            $selectStatement->execute();
          
            if($result = $selectStatement->fetchAll()) {
               echo json_encode($result);
            } 
            else{
              echo false;
            }
        } catch(PDOException $e) {
            echo json_encode(array('error' => $e->getMessage()));
        }
    }
    


 
}


 