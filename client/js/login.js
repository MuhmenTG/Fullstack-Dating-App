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
    const data = getLoginsDetails() // This function isn't async
    const response = await serverHttpRequest('../api/login.php', 'POST', data);

    // Don't tell the user whether or not the e-mail account exists, if the password is wrong. This is an OWASP security "best practice".
    if(!response.loggedIn) {
        messageBox(`#loginmsg`, "block", "red", "Invalid credentials, please try again");
    } else {
        location.href = 'myProfileEdit.php';
    }
}

document.querySelector("#loginForm").addEventListener('submit', userLogin)
