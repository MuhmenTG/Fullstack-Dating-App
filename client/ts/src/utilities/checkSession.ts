import { HttpRequest } from "./httpRequest";
export class Session {
    async isLoggedIn(){
        let isLoggedIn = await HttpRequest.server("../api/checkSession.php", "POST");
        return isLoggedIn;
    }

    async getCurrentUserId(){ 
        const userId = await HttpRequest.server("../api/returnCurrentSessionId.php", "POST")
        return (userId) ? userId : false;
    }
}