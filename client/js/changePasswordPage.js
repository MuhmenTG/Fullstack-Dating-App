import { getCurrentSessionId } from './utilities/checkSession.js';
import { postDetails } from './utilities/postApiDeta.js';


async function getUserPassword() {
    let currentPassword = document.getElementById('currentPassword').value;
    let sessionId = await getCurrentSessionId();
    console.log(sessionId);
    return{
        currentPassword:currentPassword,
        sessionId:sessionId
    }
}

async function verifyAndchangeUserPassword(){
    let data = await getUserPassword();
   
    let result = await postDetails('../api/verifyPassword.php', 'POST', data);
}

function saveNewPassword(){
    event.preventDefault();
    verifyAndchangeUserPassword();
}

document.querySelector("#passwordform").addEventListener('submit', saveNewPassword)
