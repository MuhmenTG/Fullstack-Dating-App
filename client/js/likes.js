import { getCurrentSessionId } from "./utilities/checkSession.js";
import { HttpRequest } from "./utilities/serverHttpRequest.js";
 
async function getUserLikes(){
    const userId = await getCurrentSessionId();
    const response = await HttpRequest.server('../api/Friends/getLikes.php', 'POST', {id: userId});
   // await displayInRequest(response[0]);
    console.log(response[0]);
  //  await displayOutRequest(response[1]);
    console.log(response[1]);
}

getUserLikes();