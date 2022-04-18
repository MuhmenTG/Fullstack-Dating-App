import { getCurrentSessionId } from "./utilities/checkSession.js";
import { HttpRequest } from "./utilities/serverHttpRequest.js";

export async function getNotification(){
    const userId = await getCurrentSessionId();
    const response = await HttpRequest.server('../api/notification/getNotifies.php', 'POST', {id: userId});
    return response;
}

export async function getRealTimeNotification(){
    const userId = await getCurrentSessionId();
    const response = await HttpRequest.server('../api/notification/getUnreadNotification.php', 'POST', {id: userId});
    return response;
}


export function modifyNotification(callback) {
    var mButtons = document.getElementsByClassName("notfications");
    for (let i = 0; i < mButtons.length; i++) {
        mButtons[i].addEventListener("click", function () {
        callback(this.getAttribute("data-notifyId"), this.getAttribute("data-userId")) 
        });
    }
}

export async function changeStatus(notificationId, senderId){
    console.log(notificationId, senderId);return;
    const userId = await getCurrentSessionId();
    const response = await HttpRequest.server('../api/notification/getNotifies.php', 'POST', {userId, notificationId});
    return response;
}