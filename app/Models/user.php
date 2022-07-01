<?php
  
  include("query.php");
    class User extends Query {
    
    public function __construct()
    {
        parent::__construct();
    }
    



    public function completeAndEditProfileInfo($key, $value, $userId){
        try 
        { 
            $updateQuery = ($this->isColumnExits("userInfomation", $key)) ? "UPDATE userInfomation SET $key = :params WHERE id = :id " :  "UPDATE candidatePreferences SET  $key = :params WHERE userId = :id";
            $personalData = array(':params' => $value, ':id' => $userId);
            $isUpdate = $this->executeQuery($updateQuery, $personalData); 
            return ($isUpdate) ? true : false;
        }
        catch(Exception $ex){
            echo "<pre>";
            print_r($ex);
            exit();
        }
    }

    public function changeLoggedInStatus($userId)
    {
        $updateQuery = "UPDATE userInfomation SET 
        isLoggedIn = :isLoggedIn WHERE id = :userId";
        $data = array(":isLoggedIn" => "online", ":userId" => $userId);
        return $this->executeQuery($updateQuery, $data);
    }

  
 
    public function getProfileInfomation($userId)
    {
        $selectQuery = "SELECT * FROM userInfomation WHERE id = :id";                                
        $data = array(":id" => $userId);
        return $this->executeQuery($selectQuery, $data); 
    }
    

    public function getUsers()
    {
        $selectQuery = "SELECT * FROM userInfomation";                                
        return $this->returnRecordsOfExecutedQuery($selectQuery);
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
        $selectQuery .= ($preference) ? " userPreferenceGender = :userPreferenceGender" : "";
        $selectQuery .= ($location) ? " AND userLocation = :userLocation" : "";
        $selectQuery .= ($minAge && $maxAge) ? " OR userAge BETWEEN :minAge AND :maxAge " : "";
        $selectQuery .= ($minHeight && $maxHeight) ? " OR userHeight BETWEEN :minHeight AND :maxHeight " : "";
        $selectQuery .= ($minWeight && $maxWeight)  ? " OR userWeight BETWEEN :minWeight AND :maxWeight" : "";
        $selectQuery .= ($education) ? " AND userMaximumEducation = :userMaximumEducation" : "";        
        $selectQuery .= ($smokingStatus) ? " AND userSmokingStaus = :userDrinkingStatus" : "";
        $selectQuery .= ($drinkingStatus) ? " AND userDrinkingStatus = :userDrinkingStatus" : "";
       
        
        try {
            $selectStatement = $this->connect()->prepare($selectQuery);  
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
              return $result;
            } 
            else{
              echo false;
            }
        } catch(PDOException $e) {
            echo json_encode(array('error' => $e->getMessage()));
        }
    }
    
    public function getUserInfo($userId){
        $selectQuery = "SELECT * FROM userInfomation INNER JOIN candidatePreferences WHERE userInfomation.id = candidatePreferences.userId AND userInfomation.id = :id";                                
        return $this->fetchRecord($selectQuery, ":id", $userId); 
    }

    public function suspendUserAcount($userId){
        $updateQuery = "UPDATE userInfomation SET 
        isSuspended = :isSuspended WHERE id = :userId";
        $data = array(":isSuspended" => 1, ":userId" => $userId);
        return $this->executeQuery($updateQuery, $data);
    }



 
}


