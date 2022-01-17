import { messageBox } from './utilities/message.js'; 
import { serverHttpRequest } from './utilities/serverHttpRequest.js';
 
async function middleware(){
    const email = await document.getElementById('useremail').value;
    const userid = await serverHttpRequest('../api/checkUserRecords.php', 'POST', {email});
    if(userid == "" || userid == undefined){
        messageBox(`#errormsg`, "block", "red", "Email could not be found");
        return;
    }
    messageBox(`#errormsg`, "block", "green", "Email has been found and a reset mail has been sent!");
    const response = await serverHttpRequest('../api/sendResetLink.php', 'POST', {email});
    return (response) ? true : false;
    
}

document.getElementById('forgetPasswordBtn').addEventListener('click', (e) => { 
   e.preventDefault();
   middleware()
});
