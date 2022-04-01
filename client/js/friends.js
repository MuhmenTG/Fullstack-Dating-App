import { getCurrentSessionId } from "./utilities/checkSession.js";
import { HttpRequest } from "./utilities/serverHttpRequest.js";
const incoming = document.getElementById("incoming");
const outgoing = document.getElementById("outgoing");
async function getFriendsRequest(){
    const userId = await getCurrentSessionId();
    const response = await HttpRequest.server('../api/Friends/getRequests.php', 'POST', {id: userId});
    await displayInRequest(response[0]);
    await displayOutRequest(response[1]);
}

function displayInRequest(response){
     
    if(response == null){
        //Errorhandling   
    }
    incoming.innerHTML = ` <li class="list-group-item title">
                                  Your incoming friend requests
                            </li>`;
    response.map((v, i) => {
        console.log(v);
        if(v.acceptenceStatus != "pending")
        {
            
        }
        else
        {

            incoming.innerHTML += `
            <li class="list-group-item text-left">
                <label class="name">
                ${v.firstName + " " + v.lastname}
                </label>
                <label class="pull-right">
                    <button data-request="${v.requestId}" class="btn rejectRequest-btn">Reject</button>
                    <button data-request="${v.requestId}" class="btn acceptRequest-btn">Accept</button>
                    <button data-request="${v.requestId}" class="btn blockRequest-btn">Block</button>
                    <a href="view_user.php?id=${v.id}" class="btn btn-profile">View Profile</a>
                </label>
            </li>`;
        }
    });
    modifyFriendRequest("data-request", "rejectRequest-btn", checkUserBeforeModity);
    modifyFriendRequest("data-request", "acceptRequest-btn", checkUserBeforeModity);
    modifyFriendRequest("data-request", "blockRequest-btn",  checkUserBeforeModity);
}

function displayOutRequest(response){
     
    if(response == null){
        //Errorhandling   
    }
     
    outgoing.innerHTML = ` <li class="list-group-item title">
                                Your sent friend requests
                        </li>`;
    response.map((v, i) => {
     
        outgoing.innerHTML += `
        <li class="list-group-item text-left">
            <label class="name">
                ${v.firstName + " " + v.lastname}
            </label>
            <label class="pull-right">
                <button data-request="${v.requestId}" class="btn deleteRequest-btn">Cancel request</button>
                <a href="view_user.php?id=${v.id}" class="btn btn-profile">View Profile</a>
            </label>
        </li>
    
        `;
    });
    modifyFriendRequest("data-request", "deleteRequest-btn",  checkUserBeforeModity);

}
getFriendsRequest();


function modifyFriendRequest(requestId, btnClass, callback) {
    const mButtons = document.getElementsByClassName(btnClass);
    for (let i = 0; i < mButtons.length; i++) {
        mButtons[i].addEventListener("click", function () {
        switch (btnClass) {
            case "rejectRequest-btn":
                callback(this.getAttribute(requestId), "rejected"); 
                break;
            case "acceptRequest-btn":
                callback(this.getAttribute(requestId), "accepted"); 
                break;
            case "blockRequest-btn":
                callback(this.getAttribute(requestId), "blocked"); 
                break;
            case "deleteRequest-btn":
                callback(this.getAttribute(requestId), "delete"); 
                break;
            default:
                callback(this.getAttribute(requestId), "pending"); 
                break;
        }
        });
    }
}

async function checkUserBeforeModity(requestId, status){
    const response = await friendRequestStatus(requestId, status);
    console.log(requestId);return;
    if(response){
        console.log(response);
       await getFriendsRequest()
    }
}

async function friendRequestStatus(requestId, status){
   let data = {requestId, status} 
   return await HttpRequest.server("../api/Friends/changeFriendRequest.php", "POST", data)
}