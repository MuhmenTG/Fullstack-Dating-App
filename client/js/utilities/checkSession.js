import { serverHttpRequest } from "./serverHttpRequest.js";

export async function checkSession(){
    let isLoggedIn = await serverHttpRequest("../api/checkSession.php", "POST");
    return isLoggedIn;
}

export async function getCurrentSessionId(){ 
    const userId = await serverHttpRequest("../api/returnCurrentSessionId.php", "POST")
    return (userId) ? userId : false;
}