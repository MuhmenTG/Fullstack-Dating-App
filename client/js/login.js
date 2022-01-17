import { messageBox } from './utilities/message.js';
import { serverHttpRequest } from './utilities/serverHttpRequest.js';
function getLoginsDetails()
{
    const email = document.getElementById("email").value;
    const userPassword = document.getElementById("userPassword").value;
    return {
        email: email,
        userPassword: userPassword,
    };
}

async function userLogin(){
    event.preventDefault();
    const data = await getLoginsDetails()
    const response = await serverHttpRequest('../api/login.php', 'POST', data);
    switch(response){
        case 1: 
        messageBox(`#loginmsg`, "block", "red", "Email not exist");
        break;
        case 2: 
        messageBox(`#loginmsg`, "block", "red", "Wrong Password");
        break;
        default:
        location.href = 'myProfileEdit.php';       
    }
}

document.querySelector("#loginForm").addEventListener('submit', userLogin)
