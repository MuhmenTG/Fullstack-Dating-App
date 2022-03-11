import { getCurrentSessionId } from "./utilities/checkSession.js";
import { HttpRequest } from "./utilities/serverHttpRequest.js";
const incoming = document.getElementById("incoming");
const outgoing = document.getElementById("outgoing");
async function getIncomingFriendsRequest(){
    const userId = await getCurrentSessionId();
    const response = await HttpRequest.server('../api/Friends/getRequests.php', 'POST', {id: userId});
    if(response){
        await displayInRequest(response[0]);
        await displayOutRequest(response[1])
    }
}

function displayInRequest(response){
    if(response == null){
        //Errorhandling   
    }
    response.map((v, i) => {
        console.log(v);
        incoming.innerHTML += `
        <li class="list-group-item text-left">
            <label class="name">
               ${v.firstName + " " + v.lastname}
            </label>
            <label class="pull-right">
                <button  class="btn btn-danger">Delete</button>
                <button class="btn btn-accept">Accept</button>
                <a href="view_user.php?id=${v.id}" class="btn btn-accept">View Profile</a>
            </label>
        </li>`;
    });
}

function displayOutRequest(response){
    if(response == null){
        //Errorhandling   
    }
    response.map((v, i) => {
        console.log(v);
        outgoing.innerHTML += `
        <li class="list-group-item text-left">
            <label class="name">
                ${v.firstName + " " + v.lastname}
            </label>
            <label class="pull-right">
                <button onClick="callFunction()" class="btn btn-danger">Delete</button>
                <button class="btn btn-danger">Accept</button>
                <button class="btn btn-danger">View Profile</button>
            </label>
        </li>
    
        `;
    });

}
getIncomingFriendsRequest();
function callFunction(){}