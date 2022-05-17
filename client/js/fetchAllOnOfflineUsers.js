import { getCurrentSessionId } from "./utilities/checkSession.js";
import { HttpRequest } from "./utilities/serverHttpRequest.js";

const chatSidebar = document.getElementById("chat-sidebar");
const userArray = [];
async function getOnOfflineUsers(){
    const userId = await getCurrentSessionId();
    const response = await HttpRequest.server('../api/Friends/getOnOfflineUsers.php', 'POST', {userId});
    await showUsers(response)
}

function showUsers(response){
    chatSidebar.innerHTML = ``;
   
    response.map((v, i) => {
        console.log(v);
        if(v.isLoggedIn.trim() == "Offline"){

            chatSidebar.innerHTML += `
            <div class="sidebar-user-box" data-chat="${v.id}">
            <img src="media/images/ou1.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette"></i>
            <span class="slider-username">${v.firstName} ${v.lastName}</span>
            </div> 
            `;

        }
        else if(v.isLoggedIn.trim() == "Online"){
            chatSidebar.innerHTML += `
            <div class="sidebar-user-box" data-chat="${v.id}">
            <img src="media/images/ou2.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette active"></i>
            <span class="slider-username">${v.firstName} ${v.lastName}</span>
            </div> `;
        }
    })
    chatPopUp("data-chat", "sidebar-user-box", chat);




}
getOnOfflineUsers();

function chatPopUp(userId, btnClass, callback) {
    const mButtons = document.getElementsByClassName(btnClass);
    for (let i = 0; i < mButtons.length; i++) {
        mButtons[i].addEventListener("click", function () {
            callback(this.getAttribute(userId));
        });
    }
}

function chat(userId){
  /*  if (userArray.includes(userId) != -1) {
        userArray.splice(includes(userId, userArray), 1);
    };*/
    userArray.unshift(userId);


    const chatPopup =  '<div class="msg_box" style="right:270px" rel="'+ userId+'">'+
    '<div class="msg_head"><a href="#"><img src="'+ +'" class="img-circle img-responsive"></a><span class="u_name"> '+  +
    '</span><div class="close">x</div> </div>'+
    '<div class="msg_wrap"> <div class="msg_body"> <div class="msg_push"></div> </div>'+
    '<div class="msg_footer text-block"><input type="text" placeholder="Type and hit enter" class="msg_input form-control"><span class="send-msg-btn"><i class="fa fa-paper-plane-o"></i></span></div></div></div>';     

    $("body").append(chatPopup);

}

