import { getCurrentSessionId } from "./utilities/checkSession.js";
import { HttpRequest } from "./utilities/serverHttpRequest.js";

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
    const userId = await getCurrentSessionId()
    const response = await HttpRequest.server('../api/getUserInfo.php', 'POST', {id: userId});
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
    console.log(info);
    console.log(totalParams);
    percentage = Math.floor((info / totalParams) * 100);
    console.log(percentage);
    progressbar(percentage)
}

getUserInfo();