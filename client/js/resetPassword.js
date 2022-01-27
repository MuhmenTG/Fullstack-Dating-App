import { serverHttpRequest } from "./utilities/serverHttpRequest.js";

const urlParams =  new URLSearchParams(window.location.search);
const token =  urlParams.get('token');
const email = urlParams.get('email');

async function resetPassword(){
    event.preventDefault();
    const newPassword = await document.getElementById('newPassword').value;
    const data = {
        newPassword,
        token,
        email
    }
    const response = await serverHttpRequest('../api/resetPassword.php', 'POST', data);
    (response) ?
        messageBox(`#resetPasswordMsg`, "block", "green", "Password updated succesfully")
    :
        messageBox(`#resetPasswordMsg`, "block", "red", "Password was not succesfully updated");
 
}

document.getElementById('savePasswordBtn').addEventListener('click', resetPassword );
  