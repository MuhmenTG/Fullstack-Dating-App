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
        console.log(randomTiming);
        bar.style.transitionDuration = `v.{randomTiming}s`;
        bar.style.width = `${percent}%`;
    });
    })
}

async function getUserInfo(){
    const progress = document.querySelectorAll('.progress');
    progress[0].innerHTML = "Loarding";
    const userId = await getCurrentSessionId()
    const response = await HttpRequest.server('../api/getUserInfo.php', 'POST', {id: userId});
    for (const key in response) {
        if(key != 4 && key != 0 && key != 28)

        console.log(`${key}: ${response[key]}`);
    }
    /*for (let i = 0; i < response.length; i++) {
        const element = response[i];
        console.log(element);
        
    }*/
  /* response.map((v, i) => {
        console.log(response[i]);
    })*/
    let totalParams = 0;    
    let info = 0;
    let percentage = 0;
    if(response){
       if(response["userPreferenceGender"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;info = info + 1; }
       if(response["userLocation"]  == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1; info = info + 1; }
       if(response["userAge"]  == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["userHeight"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["userWeight"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1;}
       if(response["userMaximumEducation"]  == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1;}
       if(response["userReligion"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1; info = info + 1; }
       if(response["userMaritalStatus"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1; info = info + 1; }
       if(response["userSmokingStaus"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["userDrinkingStatus"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["userParentStatus"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["userEyeColor"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["userHairColor"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["userClothingStyle"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["userLivingStyle"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["sexOfPotentialCandidate"]  == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["minAgeOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1; info = info + 1; } 
       if(response["maxAgeOfPotentialCandidate" ] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1; info = info + 1; } 
       if(response["minHeightOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["maxHeightOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["minWeightOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["maxWeightOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["cityOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["civilPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["wishedStatusPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["religionOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["smokingStatusOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["eyeColorOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["bodyOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["clothingOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["BodyArtOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["educationOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["jobOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["livingStyleOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["vehicleOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["numOfChildrenOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }
       if(response["monthlyIncomeOfPotentialCandidate"] == null) { totalParams = totalParams + 1 }else{ totalParams = totalParams + 1;  info = info + 1; }  
    }
    percentage = Math.floor((info / totalParams) * 100);
    progressbar(percentage)
}

getUserInfo();

async function updateUserInfo(key, v){
    event.preventDefault();
    const progress = document.querySelectorAll('.progress');
    progress[0].innerHTML = "Loarding";
    
    const userId = await getCurrentSessionId();
    const response = await HttpRequest.server('../api/editUserInfo.php', 'POST', {key, value: v.value, userId});
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

