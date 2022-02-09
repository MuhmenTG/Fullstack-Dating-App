import { HttpRequest } from './utilities/serverHttpRequest.js';
 
async function middleware(){
    const email = await document.getElementById('useremail').value;
    const response = await HttpRequest.server('../api/sendResetLink.php', 'POST', {email});
    switch (response) {
        case 1:
            swal("Instructions to reset your Password has ben sent")
            break;
        case 0:
            swal("something went wrong. Please try again")
            break;
        case -1:
            swal("No email registered")    
            break;
        default:
            break;
    }
}
  

document.getElementById('forgetPasswordBtn').addEventListener('click', (e) => { 
   e.preventDefault();
   middleware()
});
