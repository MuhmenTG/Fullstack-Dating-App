import { HttpRequest } from "./utilities/serverHttpRequest.js";

const urlParams =  new URLSearchParams(window.location.search);
const token =  urlParams.get('token');
const email = urlParams.get('email');

async function resetPassword(){
    event.preventDefault();
    const newPassword = await document.getElementById('password').value;
    const data = {
        newPassword,
        token,
        email
    }
    const response = await HttpRequest.server('../api/User/resetPassword.php', 'POST', data);
    (response) ?
       swal('Updated')
    :
        swal('not updated')
 
}

document.getElementById('savePasswordBtn').addEventListener('submit', resetPassword );
  