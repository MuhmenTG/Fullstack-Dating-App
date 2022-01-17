import { checkSession } from "./checkSession.js";

export async function redirect(){
    let check = await checkSession();
    console.log(check);
    if(!check){
        location.replace('index.php?isLoggedOut=true');
    }
}
redirect();