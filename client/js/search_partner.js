import { HttpRequest} from "./utilities/serverHttpRequest.js";
import { checkSession } from "./utilities/checkSession.js";
import { getCurrentSessionId } from "./utilities/checkSession.js";
const peopleContainer = document.querySelector("#peopleContainer");

function getSearchParamValues() {
    let gender = document.getElementById("gender").value;
    let preference = document.getElementById("lookingfor").value;
    let location = document.getElementById("location").value;
    let ageInterval = document.getElementById("range_1").value;
    let heightInterval = document.getElementById("range_2").value;
    let weightInterval = document.getElementById("range_3").value;
    let education = document.getElementById("education").value;
    let socialstatus = document.getElementById("socialstatus").value;
    let work = document.getElementById("work").value;
    let maritalStatus = document.getElementById("maritalStatus").value;
    let smokingStatus = document.getElementById("smokingStatus").value;
    let drinkingStatus = document.getElementById("drinkingStatus").value;
    let age = ageInterval.split(";");
    let height = heightInterval.split(";");
    let weight = weightInterval.split(";")
    return {
        gender,
        preference,
        location,
        minAge: age[0],
        maxAge: age[1],
        minHeight: height[0],
        maxHeight: height[1],
        minWeight: weight[0],
        maxWeight: weight[1],
        education,
        socialstatus,
        work,
        maritalStatus,
        smokingStatus,
        drinkingStatus
    }

}

async function searchAdvanched() {
    event.preventDefault();
    const isLoggedIn = await checkSession();
    if(isLoggedIn){
        const data = await getSearchParamValues();
        const response = await HttpRequest.server("../api/User/advancedSearch.php", "POST", data);
        await showLimitedUserByDefault(response);
    }
    else{
        swal("You have be logged in to use this service");
    }
}

async function getLimitedUserByDefault() {
    const userId = await getCurrentSessionId();
    const response = await HttpRequest.server("../api/User/getLatestUsers.php", "POST", {userId});
    if(userId){
        console.log('loggedIn');
        await showLimitedUserForLoggedInUser(response);
    }
    else{
        await showLimitedUserByDefault(response);
    }

}


function showLimitedUserByDefault(data) {
    peopleContainer.innerHTML = "";
    peopleContainer.innerHTML = `
    <div class="col-lg-12">
    <div class="title2">
        <h2 class="fz35">Search Result : 247</h2>
        <div class="clearfix"></div>
        <p class="fz20">Aliquam a neque tortor. Donec iaculis auctor turpis. Eporttitor<br> mattis ullamcorper urna. Cras quis elementum</p>
    </div>
    </div>`;
   
    data.map((v, i) => {
        peopleContainer.innerHTML += `
            <div class="col-md-3 col-sm-4  col-xs-6">
                <div class="block-stl2">
                    <div class="img-holder">
                        <img src="media/images/img13.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="txt-block">
                        <h3 class="fz22">${v[1] + ' ' + v[2]}</h3>
                        <p> ${v[5]} / ${v[9]} / ${v[8]}	</p>
                        <button class="btn" onclick="viewDetails(${v[0]})"><i class="fa fa-eye"></i> Details</button>  
                        </a>
                    </div>
                </div>
            </div>`;
        });
        peopleContainer.innerHTML += ` 
            <div class="col-lg-12">
            <div class="text-center">
                <a href="#" class="c-btn btn1"> View More</a>
            </div>
            </div>`;

}



function showLimitedUserForLoggedInUser(data) {

    peopleContainer.innerHTML = "";
    peopleContainer.innerHTML = `
    <div class="col-lg-12">
    <div class="title2">
        <h2 class="fz35">Search Result : 247</h2>
        <div class="clearfix"></div>
        <p class="fz20">Aliquam a neque tortor. Donec iaculis auctor turpis. Eporttitor<br> mattis ullamcorper urna. Cras quis elementum</p>
    </div>
    </div>
    `;
   
    if(data[1]){
       let found = false;
        data[1].map((v, i) => {
            data[0].map((j, i) =>{
                if(j.liked == v.id){
                   found = true;
                }
            })
            peopleContainer.innerHTML += `
            <div class="col-md-3 col-sm-4  col-xs-6">
                <div class="block-stl2">
                    <div class="img-holder">
                        <img src="media/images/img13.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="txt-block">
                        <h3 class="fz22">${v[1] + ' ' + v[2]}</h3>
                        <p> ${v[5]} / ${v[9]} / ${v[8]}	</p>
                        <button class="btn" onclick="viewDetails(${v[0]})"><i class="fa fa-eye"></i> Details</button> 
                        <button class="btn" onclick="sendFriendRequest(${v[0]})"><i class="fa fa-plus"></i> Friend</button> 
                        <button class="btn" onclick="sendLike(${v[0]})"><i class="fa fa-heart"></i>${(found) ? 'unLike' : 'Like'}</button>
                    </div>
                </div>
            </div>
    
        `;
        found = false;
        });
        peopleContainer.innerHTML += `
  
        <div class="col-lg-12">
        <div class="text-center">
            <a href="#" class="c-btn btn1"> View More</a>
        </div>
        </div>
    `;
    }
}


window.viewDetails = async (userId) => {
    const isLoggedIn = await checkSession()
    (!isLoggedIn) ? $("#loginModal").modal() : location.href = `viewUserProfile.php?id=${userId}`; 
}
window.sendFriendRequest = async(receiverUserId)  => {
    const userId = await getCurrentSessionId();
    const requestTo = rece$iverUserId;
    const data = {id: userId, receiverUserId: requestTo}
    const response = await HttpRequest.server('../api/Friends/sendFriendRequest.php', 'POST', data);
    switch(response){
        case -1:
            swal("Request Already sent");
            break;
        case 1:
            swal("Friend request is sent")
            const response = await HttpRequest.server('../api/notification/sendNotify.php', 'POST', data)
            break;
        default:
            break;
    }
}

window.sendLike = async(receiverUserId)  => {
    const userId = await getCurrentSessionId();
    const requestTo = receiverUserId;
    const data = {id: userId, receiverUserId: requestTo};
    const response = await HttpRequest.server('../api/Friends/likePerson.php', 'POST', data);
    if(response){
       await getLimitedUserByDefault();
       const response = await HttpRequest.server('../api/notification/sendNotify.php', 'POST', data)
    }
}

document.querySelector("#searchForm").addEventListener("submit", searchAdvanched);

(peopleContainer != null) ? getLimitedUserByDefault() : null;

