import { getCurrentSessionId, getCurrentSessionEmail } from "./utilities/checkSession.js";
import { HttpRequest } from "./utilities/serverHttpRequest.js";


async function suspendAccount(){
    const userId = await getCurrentSessionId();
    const userInfo = await HttpRequest.server('../api/getUserInfo.php', 'POST', {id: userId});
    const userEmail = userInfo["email"];
    let data = {userId, userEmail};
    const response = await HttpRequest.server('../api/suspendAccount.php', 'POST', data);
    if(response){
        location.href = "index.php";
    }
}

function verifyUser(){
    suspendAccount();

}
document.querySelector("#confirmSuspensionnButton").addEventListener('click', verifyUser)


