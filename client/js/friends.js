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
        if(v.friendStatus != "pending")
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
                    <button data-request="${v.requestId}" data-userId="${v.id}" class="btn rejectRequest-btn">Reject</button>
                    <button data-request="${v.requestId}"  data-userId="${v.id}" class="btn acceptRequest-btn">Accept</button>
                    <button data-request="${v.requestId}" data-userId="${v.id}" class="btn blockRequest-btn">Block</button>
                    <a href="view_user.php?id=${v.id}" class="btn btn-profile">View Profile</a>
                </label>
            </li>`;
        }
    });
    modifyFriendRequest("data-request", "rejectRequest-btn", "data-userId", checkUserBeforeModity);
    modifyFriendRequest("data-request", "acceptRequest-btn", "data-userId", checkUserBeforeModity);
    modifyFriendRequest("data-request", "blockRequest-btn", "data-userId", checkUserBeforeModity);
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
                <button data-request="${v.requestId}" data-userId="${v.id}" class="btn deleteRequest-btn">Cancel request</button>
                <a href="view_user.php?id=${v.id}" class="btn btn-profile">View Profile</a>
            </label>
        </li>
    
        `;
    });
    modifyFriendRequest("data-request", "deleteRequest-btn", "data-delete", checkUserBeforeModity);

}
getFriendsRequest();


function modifyFriendRequest(requestId, btnClass, btnDataName, callback, btnUserId = "data-userId") {
    const mButtons = document.getElementsByClassName(btnClass);
    for (let i = 0; i < mButtons.length; i++) {
        mButtons[i].addEventListener("click", function () {
            event.preventDefault();
        switch (btnClass) {
            case "rejectRequest-btn":
                callback(this.getAttribute(requestId), this.getAttribute(btnDataName), "rejected"); 
                break;
            case "acceptRequest-btn":
                callback(this.getAttribute(requestId), this.getAttribute(btnDataName), "accepted"); 
                break;
            case "blockRequest-btn":
                callback(this.getAttribute(requestId), this.getAttribute(btnDataName), "blocked"); 
                break;
            case "deleteRquest-btn":
                callback(this.getAttribute(requestId), this.getAttribute(btnDataName), "delete"); 
                break;
            default:
                callback(this.getAttribute(requestId), this.getAttribute(btnDataName), "pending"); 
                break;
        }
        });
    }
}

async function checkUserBeforeModity(requestId, friendId, status){
    const userId = await getCurrentSessionId();
    const response = await friendRequestStatus(requestId, userId, friendId, status);
    if(response){
       await getFriendsRequest()
    }
}

async function friendRequestStatus(requestId, userId, friendId, status){
   let data = {requestId, userId, friendId, status} 
   return await HttpRequest.server("../api/Friends/changeFriendRequest.php", "POST", data)
}