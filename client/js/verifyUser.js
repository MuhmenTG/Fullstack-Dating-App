import { serverHttpRequest } from './utilities/serverHttpRequest.js';
const urlParams =  new URLSearchParams(window.location.search);
const token = urlParams.get("token");

(token != "") ? verifyUser() : document.getElementById('msg').innerHTML = "Token not found";

async function verifyUser(){
    let response = await serverHttpRequest("../api/verifyUser.php", 'POST', {token})
    if(response)
    {
       document.getElementById('msg').innerHTML = "Verification successfull"
       location.href = "index.php"
    }
    else
    {
        document.getElementById('msg').innerHTML = "Verification unsuccessfull"
    }
}