import { postDetails } from './utilities/postApiDeta.js';
import { serverHttpRequest } from './utilities/serverHttpRequest.js';

 
function getUserDetails()
{
    let loggedInUser = document.getElementById('userid').value;
    let userPreferenceGender = document.getElementById('userPreferenceGender').value;
    let userLocation = document.getElementById('userLocation').value;
    let userAge = document.getElementById('userAge').value;
    let userHeight = document.getElementById('userHeight').value;
    let userWeight = document.getElementById('userWeight').value;
    let userMaximumEducation = document.getElementById('userMaximumEducation').value;
    let userReligion = document.getElementById('userReligion').value;
    let userMaritalStatus = document.getElementById('userMaritalStatus').value;
    let userSmokingStaus = document.getElementById('userSmokingStaus').value;
    let userDrinkingStatus = document.getElementById('userDrinkingStatus').value;
    let userParentStatus = document.getElementById('userParentStatus').value;
    let userEyeColor = document.getElementById('userEyeColor').value;
    let userHairColor = document.getElementById('userHairColor').value;
    let userClothingStyle = document.getElementById('userClothingStyle').value;
    let userLivingStyle = document.getElementById('userLivingStyle').value;
    return {
        loggedInUser:loggedInUser,
        userPreferenceGender:userPreferenceGender,
        userLocation:userLocation,
        userAge:userAge,
        userHeight:userHeight,
        userWeight:userWeight,
        userMaximumEducation:userMaximumEducation,
        userReligion:userReligion,
        userMaritalStatus:userMaritalStatus,
        userSmokingStaus:userSmokingStaus,
        userDrinkingStatus:userDrinkingStatus,
        userParentStatus:userParentStatus,
        userEyeColor:userEyeColor,
        userHairColor:userHairColor,
        userClothingStyle:userClothingStyle,
        userLivingStyle:userLivingStyle
    }   
}

async function updateUserDetails(){
    const data = await getUserDetails();
    const response = await serverHttpRequest('../api/updateUserData.php', 'POST', data);
    return (response) ? true : false;
}

function saveChanges(){
    event.preventDefault();
    (updateUserDetails()) ? console.log('Updated profile') : console.log('error ');;

}
document.querySelector("#profileform").addEventListener('submit', saveChanges)

