import { HttpRequest} from "./utilities/serverHttpRequest.js";
import { checkSession } from "./utilities/checkSession.js";
import { getCurrentSessionId } from "./utilities/checkSession.js";
const peopleContainer = document.querySelector("#peopleContainer");
const userId = await getCurrentSessionId();
function getSearchParamValues() {
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
        drinkingStatus,
        userId
    }

}

async function searchAdvanched() {
    event.preventDefault();
    const isLoggedIn = await checkSession();
    if(isLoggedIn){
        const data = await getSearchParamValues();
        const response = await HttpRequest.server("../api/User/advancedSearch.php", "POST", data);
        await showUsersForLoggedInUser(response);
    }
    else{
        swal("You have be logged in to use this service");
    }
}

async function getUsers() {
    const userId = await getCurrentSessionId();
    const response = await HttpRequest.server("../api/User/getLatestUsers.php", "POST", {userId});
     if(userId){
        await showUsersForLoggedInUser(response);
    }
    else{
        await showUserByDefault(response);
    }

}


function showUserByDefault(data) {
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



function showUsersForLoggedInUser(data) {
console.log(data);
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
   
    if(data[1] || data[2]){
        let found = false;
        let isFriend = '';

        data[1].map((v, i) => {
            data[0].map((j, i) =>{
                if(j.liked == v.id){
                   found = true;
                }
            })
        if(data[2]){
            data[2].map((j, i) =>{
                if(j.receiverId == v.id){
                    isFriend = j.acceptenceStatus;
                }
            })
        }
             peopleContainer.innerHTML += `
            <div class="col-md-3 col-sm-4  col-xs-6">
                <div class="block-stl2">
                    <div class="img-holder">
                        <img src="media/images/img13.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="txt-block">
                        <h3 class="fz22">${v[1] + ' ' + v[2]}</h3>
                        <p> ${v[5]} / ${v[9]} / ${v[8]}	</p>

                        <button class="btn view-btn" data-userId="${v[0]}"><i class="fa fa-eye"></i> Details</button> 

                        <button class="btn sendRequest-btn" data-userId="${v[0]}"><i></i>${(isFriend == "pending") ? 'Requested' : (isFriend == "accepted") ? 'Friends' : (isFriend == "") ? 'Add as friend' : null}</button> 

                        <button class="btn like-btn" data-userId="${v[0]}""><i class="fa fa-heart"></i>${(found) ? 'unLike' : 'Like'}</button>
                    </div>
                </div>
            </div>
    
        `;
        found = false;
        isFriend = "";
        });
        peopleContainer.innerHTML += `
  
        <div class="col-lg-12">
        <div class="text-center">
            <a href="#" class="c-btn btn1"> View More</a>
        </div>
        </div>
    `;
    }

    userAction("data-userId", "view-btn", viewDetails);

    userAction("data-userId", "sendRequest-btn", sendRequest, "../api/Friends/sendFriendRequest.php");

    userAction("data-userId", "like-btn", sendRequest, "../api/Friends/likePerson.php");
 
}

function userAction(userId, btnClass, callback, apiUrl) {
    const buttons = document.getElementsByClassName(btnClass);
    for (let i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", function () {
        switch (btnClass) {
            case "view-btn":
                callback(this.getAttribute(userId)); 
                break;
            case "like-btn":
                callback(this.getAttribute(userId), btnClass, apiUrl); 
                break;
            case "sendRequest-btn":
                callback(this.getAttribute(userId), btnClass, apiUrl); 
                break;
        }
        });
    }
}

 
async function viewDetails(userId){
   location.href = `viewUserProfile.php?id=${userId}`; 
}
async function sendRequest(receiverUserId, btnClass, api) {
    const userId = await getCurrentSessionId();
    const requestTo = receiverUserId;
    const data = {id: userId, receiverUserId: requestTo, message: " liked you"};
    const response = await HttpRequest.server(api, 'POST', data);
    if(response && btnClass == "like-btn"){
       await getUsers();
       const response = await HttpRequest.server('../api/notification/sendNotify.php', 'POST', data)
    }
    else if(response && btnClass == "sendRequest-btn"){
        switch(response){
            case -1:
                swal("Request Already sent");
                break;
            case 1:
                await getUsers();
               // swal("Friend request is sent");
                data = {id: userId, receiverUserId: requestTo, message: " send you a friend request"}
                const response = await HttpRequest.server('../api/notification/sendNotify.php', 'POST', data)
             
                break;
            default:
                break;
        }
    }
}

 
document.querySelector("#searchForm").addEventListener("submit", searchAdvanched);

(peopleContainer != null) ? getUsers() : null;

