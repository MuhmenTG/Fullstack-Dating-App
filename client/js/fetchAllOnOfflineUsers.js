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
            <div class="sidebar-user-box" data-fullName="${v.firstName} ${v.lastName}" data-chat="${v.id}">
            <img src="media/images/ou1.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette"></i>
            <span class="slider-username">${v.firstName} ${v.lastName}</span>
            </div> 
            `;

        }
        else if(v.isLoggedIn.trim() == "Online"){
            chatSidebar.innerHTML += `
            <div class="sidebar-user-box" data-fullName="${v.firstName} ${v.lastName}" data-chat="${v.id}">
            <img src="media/images/ou2.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette active"></i>
            <span class="slider-username">${v.firstName} ${v.lastName}</span>
            </div> `;
        }
    })
    chatPopUp("data-chat", "data-fullName", "sidebar-user-box", chat);




}
getOnOfflineUsers();

function chatPopUp(userId, fullName, btnClass, callback) {
    const mButtons = document.getElementsByClassName(btnClass);
    for (let i = 0; i < mButtons.length; i++) {
        mButtons[i].addEventListener("click", function () {
            callback(this.getAttribute(userId), this.getAttribute(fullName));
        });
    }
}

async function chat(userId, fullName){
const loggedInUserId = await getCurrentSessionId();
const data = await getMessagesBetweenUsers(userId);
console.log(data);
    let chat = {
        id:userId,
        chatPopUp:`
        <div class="container1">
          <div class="chatbox">
            <div class="top-bar">
              <div class="avatar"><p>V</p></div>
              <div class="name">${fullName}</div>
              <div class="icons">
                <i class="fas fa-phone"></i>
                <i class="fas fa-video"></i>
              </div>
              <div class="menu">
                <div class="dots"></div>
              </div>
            </div>
            <div class="middle">
              <div class="voldemort">
                ${data.map((v, i) => {
                  if(v.senderID == loggedInUserId){
                  return `<div class="incoming"> <div class="bubble">${v.textMessage}</div> </div>`
                  }
                  return `<div class="outgoing"> <div class="bubble lower">${v.textMessage}</div> </div>`
                })}
               
    
                <div class="typing">
                  <div class="bubble">
                    <div class="ellipsis one"></div>
                    <div class="ellipsis two"></div>
                    <div class="ellipsis three"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="bottom-bar">
              <div class="chat">
                <input id="chatMsg" class="inputChat" type="text" placeholder="Type a message..." />
                <button id="sendMessageButton" data-senderId=${userId} class="button1" type="submit"><i class="fas fa-paper-plane"></i></button>
              </div>
            </div>
          </div>
    
         
        </div>`
    };
   
    userArray.push(chat);
    userArray.map((v, i) => {
      modifyMsg("button1", "data-senderId", sendMessage, i, v)
    })
 //   const chatPopup = 



 function modifyMsg(btnClass, reciverId, callback, chatNumber, chat) {
  document.querySelector("body").innerHTML += chat.chatPopUp;
  document.getElementsByClassName(btnClass)[chatNumber].addEventListener("click", function () {
      callback(this.getAttribute(reciverId)); 
  });
}

async function sendMessage(reciverId){
  const userId = await getCurrentSessionId();
  const message = document.getElementById("chatMsg").value; 
  const response = await HttpRequest.server('../api/Messages/addNewMessage.php', 'POST', {userId, reciverId, message});
  if(response){
    const data = await getMessagesBetweenUsers(userId);
    document.querySelector('.voldemort').innerHTML =+ `
    ${data.map((v, i) => {
      if(v.senderID == userId){
      return `<div class="incoming"> <div class="bubble">${v.textMessage}</div> </div>`
      }
      return `<div class="outgoing"> <div class="bubble lower">${v.textMessage}</div> </div>`
    })}
    `
  }
}

async function getMessagesBetweenUsers(friendId){
  const userId = await getCurrentSessionId();
  const response = await HttpRequest.server('../api/Messages/fetchConversation.php', 'POST', {userId, friendId});
  return response;
}
 
}

 