import { messageBox } from './utilities/message.js';
import { HttpRequest } from './utilities/serverHttpRequest.js';
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
    const response = await HttpRequest.server("../api/login.php", 'POST', data);
    if(response){
        location.href = 'myProfileEdit.php';    
        messageBox(`#loginmsg`, "block", "red", "");
    }
    else{
        messageBox(`#loginmsg`, "block", "red", "Login credentials incorrect, try again");
    }
}

document.querySelector("#loginForm").addEventListener('submit', userLogin)
