<?php
    include("inc/config.php");
    class User extends Database {

    private $db;
    private $userID;
    public function __construct()
    {
        parent::__construct();
        if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
            $this->userID = $_SESSION['id'];
        }
        $this->db=$this->connect();
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
    
    public function isRecordExits($recordSelect, $table, $colmn, $param)
    {
        $selectQuery = "SELECT $recordSelect FROM $table WHERE $colmn = :params AND isVerified = 1"; 
        $selectStatement = $this->connect()->prepare($selectQuery);  
        $selectStatement->bindParam(':params', $param);
        $selectStatement->execute();
        return $selectStatement->fetch();
    }
     
    public function registerUser($firstName, $lastName, $emailaddress, $password, $gender, $token)
    {
        if($this->isRecordExits('email', 'userInfomation', 'email', $emailaddress))
        {
            $_SESSION['emailExist'] = $this->userExist;
            echo  "<script> alert('User already Called')</script>";return;
            return;
        }
        $insertQuery = "INSERT INTO userInfomation (firstName, lastName, email, userPassword, gender, verifyToken) 
        VALUES(:firstName, :lastName, :email, :userPassword, :gender, :verifyToken)";
        $data = array(":firstName" => $firstName, ":lastName" => $lastName, ":email" => $emailaddress,
        ":userPassword" => $password, ":gender" => $gender, ":verifyToken" => $token);
        return $this->executeQuery($insertQuery, $data); 
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
            
            $updateQuery = $this->db->prepare($updateQuery);  
            $updateQuery->bindParam(':id', $loggedInUser);
            $updateQuery->bindParam(':userPreferenceGender', $userPreferenceGender);
            $updateQuery->bindParam(':userLocation', $userLocation);
            $updateQuery->bindParam(':userAge', $userAge);
            $updateQuery->bindParam(':userHeight', $userHeight);
            $updateQuery->bindParam(':userWeight', $userWeight);
            $updateQuery->bindParam(':userMaximumEducation', $userMaximumEducation);
            $updateQuery->bindParam(':userReligion', $userReligion);
            $updateQuery->bindParam(':userMaritalStatus', $userMaritalStatus);
            $updateQuery->bindParam(':userSmokingStaus', $userSmokingStaus);
            $updateQuery->bindParam(':userDrinkingStatus', $userDrinkingStatus);
            $updateQuery->bindParam(':userParentStatus', $userParentStatus);
            $updateQuery->bindParam(':userEyeColor', $userEyeColor);
            $updateQuery->bindParam(':userHairColor', $userHairColor);
            $updateQuery->bindParam(':userClothingStyle', $userClothingStyle);
            $updateQuery->bindParam(':userLivingStyle', $userLivingStyle);
            $isUpdate = $updateQuery->execute();
            if($isUpdate)
            {
                echo "Your profile has been updated";
            }
            else
            {
                echo "Your profile has not been updated";
            }
         
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
        $selectQuery = "SELECT * FROM userInfomation WHERE id = ?";                                
        $selectStatement = $this->db->prepare($selectQuery);  
        $selectStatement->execute([$userId]);
        $dataResult = $selectStatement->fetchAll();   
        return $dataResult;
    }
    
    public function resetPasswordSetToken($email, $token)
    {
        $insertQuery = "INSERT INTO resetPassword (userEmail, token) 
        VALUES(:userEmail, :token)";
        $data = array(":userEmail" => $email, ":token" => $token);
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

    public function getUsers()
    {
        $selectQuery = "SELECT * FROM userInfomation LIMIT 30";                                
        $selectStatement = $this->db->prepare($selectQuery);  
        $selectStatement->execute();
        $result = $selectStatement->fetchAll();   
        return $result;
    }



    
    public function logout()
    {
        if(isset($_SESSION['userID']))
        {
            session_destroy();
            $_SESSION['loggedOut'] = $this->loggedOut;
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



    /* Updating Password at profilepage */
    public function varifyPassword(
    $userID,
    $oldPassword,
    $newPassword)    {
        $selectQuery = "SELECT * FROM userInfomation WHERE id = :id";
        $selectStatement = $this->db->prepare($selectQuery);  
        $selectStatement->bindParam(':id', $userID);
        $selectStatement->execute();
        $result = $selectStatement->fetch();
        if(password_verify($oldPassword, $result['userPassword']))
        {
           return 1;
        }
        else 
        {
            return 2;
        }
 
    }
    public function savePassword(
    $userID,
    $oldPassword,
    $newPassword)
    {
        if($this->varifyPassword( 
        $userID,
        $oldPassword,
        $newPassword))
        {
            echo 1;
        }
        else{
            echo 2;
        }

       
     
    }
    /* Updating Password at profilepage */
    /*
     try {
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
          
            $updateQuery = "UPDATE userInfomation SET 
            userPassword = :userPassword
            WHERE id = :id";
            $updateQuery = $this->db->prepare($updateQuery);  
            $updateQuery->bindParam(':userPassword', $userPassword);
            $updateQuery->bindParam(':id', $userID);
            $isUpdate = $updateQuery->execute();
            if($isUpdate)
            {
                echo "updated";
            }
            else
            {
                echo "not updated";
            }
        }   
        catch(Exception $ex)
        {
            echo "<pre>";
            print_r($ex);
            exit();
        }
    */
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
            $selectStatement = $this->db->prepare($selectQuery);  
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
    




    private function executeQuery($query, $data){
        $statement = $this->db->prepare($query);
        foreach($data as $key => &$value) {    
            $statement->bindParam($key, $value);
        }
        $executeQuery = $statement->execute();
        if($executeQuery){
            echo true;
        }
        else{
            echo false;
        }
    }

 
}


     
 
?>