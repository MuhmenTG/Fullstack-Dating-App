import { HttpRequest } from "./serverHttpRequest.js";

export async function checkSession(){
    let isLoggedIn = await HttpRequest.server("../api/checkSession.php", "POST");
    return isLoggedIn;
}

export async function getCurrentSessionId(){ 
    const userId = await HttpRequest.server("../api/returnCurrentSessionId.php", "POST");
    return (userId) ? userId : false;
}

export async function getCurrentSessionEmail(){ 
    const userEmail = await HttpRequest.server("../api/returnLoggedInEmail.php", "POST");
    return (userEmail) ? userEmail : false;
}