import { getCurrentSessionId } from "./utilities/checkSession.js";
import { HttpRequest } from "./utilities/serverHttpRequest.js";

const firstName = document.getElementById("firstName");
const lastName = document.getElementById("lastName");
const gender = document.getElementById("gender");
const userLocation = document.getElementById("userLocation");
const userAge = document.getElementById("userAge");
const userHeight = document.getElementById("userHeight");
const userWeight = document.getElementById("userWeight");
const userMaximumEducation = document.getElementById("userMaximumEducation");  
const userReligion = document.getElementById("userReligion");
const userMaritalStatus = document.getElementById("userMaritalStatus");
const userSmokingStaus = document.getElementById("userSmokingStaus");
const userDrinkingStatus = document.getElementById("userDrinkingStatus");
const userParentStatus = document.getElementById("userParentStatus");
const userEyeColor = document.getElementById("userEyeColor");
const userHairColor = document.getElementById("userHairColor");
const userClothingStyle = document.getElementById("userClothingStyle");
const userLivingStyle = document.getElementById("userLivingStyle");
const sexOfPotentialCandidate = document.getElementById("sexOfPotentialCandidate");
const minAgeOfPotentialCandidate = document.getElementById("minAgeOfPotentialCandidate"); 
const maxAgeOfPotentialCandidate = document.getElementById("maxAgeOfPotentialCandidate"); 
const minHeightOfPotentialCandidate = document.getElementById("minHeightOfPotentialCandidate");
const maxHeightOfPotentialCandidate = document.getElementById("maxHeightOfPotentialCandidate");
const minWeightOfPotentialCandidate = document.getElementById("minWeightOfPotentialCandidate");
const maxWeightOfPotentialCandidate = document.getElementById("maxWeightOfPotentialCandidate");
const cityOfPotentialCandidate = document.getElementById("cityOfPotentialCandidate");
const civilPotentialCandidate = document.getElementById("civilPotentialCandidate");
const wishedStatusPotentialCandidate = document.getElementById("wishedStatusPotentialCandidate");
const religionOfPotentialCandidate = document.getElementById("religionOfPotentialCandidate");

const smokingStatusOfPotentialCandidate = document.getElementById("smokingStatusOfPotentialCandidate");
const eyeColorOfPotentialCandidate = document.getElementById("eyeColorOfPotentialCandidate");
const bodyOfPotentialCandidate = document.getElementById("bodyOfPotentialCandidate");
const hairColorOfPotentialCandidate = document.getElementById("hairColorOfPotentialCandidate");
const apperanceOfPotentialCandidate = document.getElementById("apperanceOfPotentialCandidate");
const clothingOfPotentialCandidate = document.getElementById("clothingOfPotentialCandidate");
const BodyArtOfPotentialCandidate = document.getElementById("BodyArtOfPotentialCandidat");
const educationOfPotentialCandidate = document.getElementById("educationOfPotentialCandidate");
const jobOfPotentialCandidate = document.getElementById("jobOfPotentialCandidate");
const livingStyleOfPotentialCandidate = document.getElementById("livingStyleOfPotentialCandidate");
const vehicleOfPotentialCandidate = document.getElementById("vehicleOfPotentialCandidate");
const numOfChildrenOfPotentialCandidate = document.getElementById("numOfChildrenOfPotentialCandidate");
const monthlyIncomeOfPotentialCandidate = document.getElementById("monthlyIncomeOfPotentialCandidate"); 

 
function progressbar(percent){
    const bars = document.querySelectorAll('.bar');
    const progress = document.querySelectorAll('.progress');

    bars.forEach((bar, index) => {
    const randomWidth = Math.floor((Math.random() * 65) + 10);
    bar.style.width = `v.{randomWidth}%`;

    progress[index].addEventListener('mouseover', () => {
        const randomTiming = Math.floor((Math.random() * 2) + 2);
        bar.style.transitionDuration = `v.{randomTiming}s`;
        bar.style.width = `${percent}%`;
    });
    })
}


async function getUserInfo(){
    const progress = document.querySelectorAll('.progress');
  //  progress[0].innerHTML = "Loarding";
    const userId = await getCurrentSessionId()
    const response = await HttpRequest.server('../api/User/getUserInfo.php', 'POST', {id: userId});
    let totalParams = 0;    
    let info = 0;
    let percentage = 0;
    if(response){
     
        for (const key in response) {
            if(key != 4 && key != 0 && key != 28)
            {
                if(response[key] == null)
                { 
                    totalParams = totalParams + 1 
                }
                else{ 
                    totalParams = totalParams + 1;
                    info = info + 1; 
                }
            }
        }
         

        settingValue(response);
    }
    percentage = Math.floor((info / totalParams) * 100);
    progressbar(percentage)
}

function selectBox(element, data, length) {
    
    for (let i = 0; i < length; ++i) {
      if (element.options[i].value == data[5]) {
        element.selectedIndex = i;
        element.options[i].selected = true;
        break;
      }
    }

}
 
  
    
function settingValue(response){
    for (let i = 0; i < 3; ++i) {
        if (gender.options[i].value == response[5]) {
          gender.selectedIndex = i;
          gender.options[i].selected = true;
          break;
        }
      }
 
    firstName.value = `${response["firstName"]}`
    lastName.value = `${response["lastName"]}`
}
getUserInfo();

async function updateUserInfo(key, v){
    event.preventDefault();
    const progress = document.querySelectorAll('.progress');
    progress[0].innerHTML = "Loarding";
    
    const userId = await getCurrentSessionId();
    const response = await HttpRequest.server('../api/User/editUserInfo.php', 'POST', {key, value: v.value, userId});
    if(response){
        getUserInfo();
    }
}


firstName.oninput = function() {updateUserInfo("firstName",firstName)};
lastName.oninput = function() {updateUserInfo("lastName", lastName)};
gender.onchange = function() {updateUserInfo("gender", gender)};
userAge.onchange = function() {updateUserInfo("userAge", userAge)};
userHeight.onchange = function() {updateUserInfo("userHeight", userHeight )};
userWeight.onchange = function() {updateUserInfo("userWeight", userWeight )};
userMaximumEducation.onchange = function() {updateUserInfo("userMaximumEducation", userMaximumEducation )};  
userReligion.onchange = function() {updateUserInfo("userReligion", userReligion )};
userMaritalStatus.onchange = function() {updateUserInfo("userMaritalStatus", userMaritalStatus )};
userSmokingStaus.onchange = function() {updateUserInfo("userSmokingStaus", userSmokingStaus )};
userDrinkingStatus.onchange = function() {updateUserInfo("userDrinkingStatus", userDrinkingStatus )};
userParentStatus.onchange = function() {updateUserInfo("userParentStatus", userDrinkingStatus )};
userEyeColor.onchange = function() {updateUserInfo("userEyeColor", userEyeColor )};
userHairColor.onchange = function() {updateUserInfo("userHairColor", userHairColor )};
userClothingStyle.onchange = function() {updateUserInfo( "userClothingStyle", userClothingStyle )};
sexOfPotentialCandidate.onchange = function() {updateUserInfo("sexOfPotentialCandidate", sexOfPotentialCandidate )};
minAgeOfPotentialCandidate.onchange = function() {updateUserInfo("minAgeOfPotentialCandidate", minAgeOfPotentialCandidate )}; 
maxAgeOfPotentialCandidate.onchange = function() {updateUserInfo("maxAgeOfPotentialCandidate", maxAgeOfPotentialCandidate )}; 
minHeightOfPotentialCandidate.onchange = function() {updateUserInfo("minHeightOfPotentialCandidate", minHeightOfPotentialCandidate )};
maxHeightOfPotentialCandidate.onchange = function() {updateUserInfo("maxHeightOfPotentialCandidate", maxHeightOfPotentialCandidate  )}
minWeightOfPotentialCandidate.onchange = function() {updateUserInfo("minWeightOfPotentialCandidate", minWeightOfPotentialCandidate )};
maxWeightOfPotentialCandidate.onchange = function() {updateUserInfo("maxWeightOfPotentialCandidate", maxWeightOfPotentialCandidate )};
cityOfPotentialCandidate.onchange = function() {updateUserInfo("cityOfPotentialCandidate", cityOfPotentialCandidate )};
wishedStatusPotentialCandidate.onchange = function() {updateUserInfo("wishedStatusPotentialCandidate", wishedStatusPotentialCandidate )};
religionOfPotentialCandidate.onchange = function() {updateUserInfo("religionOfPotentialCandidate", religionOfPotentialCandidate )};
smokingStatusOfPotentialCandidate.onchange = function() {updateUserInfo("smokingStatusOfPotentialCandidate", smokingStatusOfPotentialCandidate )};
eyeColorOfPotentialCandidate.onchange = function() {updateUserInfo("eyeColorOfPotentialCandidate", eyeColorOfPotentialCandidate )};
bodyOfPotentialCandidate.onchange = function() {updateUserInfo("bodyOfPotentialCandidate", bodyOfPotentialCandidate)};
educationOfPotentialCandidate.onchange = function() {updateUserInfo("educationOfPotentialCandidate", educationOfPotentialCandidate)}
apperanceOfPotentialCandidate.onchange = function(){updateUserInfo("apperanceOfPotentialCandidate", apperanceOfPotentialCandidate)};
hairColorOfPotentialCandidate.onchange = function(){updateUserInfo("hairColorOfPotentialCandidate", hairColorOfPotentialCandidate)}
clothingOfPotentialCandidate.onchange = function() {updateUserInfo("clothingOfPotentialCandidate", clothingOfPotentialCandidate )};
BodyArtOfPotentialCandidate.onchange = function() {updateUserInfo("BodyArtOfPotentialCandidate", BodyArtOfPotentialCandidate )};
jobOfPotentialCandidate.onchange = function() {updateUserInfo("jobOfPotentialCandidate", jobOfPotentialCandidate )};
livingStyleOfPotentialCandidate.onchange = function() {updateUserInfo("livingStyleOfPotentialCandidate", livingStyleOfPotentialCandidate )};
vehicleOfPotentialCandidate.onchange = function() {updateUserInfo("vehicleOfPotentialCandidate", vehicleOfPotentialCandidate )};
numOfChildrenOfPotentialCandidate.onchange = function() {updateUserInfo("numOfChildrenOfPotentialCandidate", numOfChildrenOfPotentialCandidate )}
monthlyIncomeOfPotentialCandidate.onchange = function() {updateUserInfo("monthlyIncomeOfPotentialCandidate", monthlyIncomeOfPotentialCandidate)};