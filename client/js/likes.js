import { getCurrentSessionId } from "./utilities/checkSession.js";
import { HttpRequest } from "./utilities/serverHttpRequest.js";
const container = document.getElementById("likesBox"); 
const incontainer = document.getElementById("inlikesBox");
async function getUserLikes(){
    const userId = await getCurrentSessionId();
    const response = await HttpRequest.server('../api/Friends/getLikes.php', 'POST', {id: userId});
    await showLikedUsers(response[1], response[1].length);
    await showIncomingLikes(response[0], response[0].length);
}
getUserLikes();

function showLikedUsers(data, persons) {
    container.innerHTML = `<h1 style="font-size: 30px;" id="heading">You have liked ${persons} persons</h1>`
    data.map((v, i) => {
        container.innerHTML += `
            <div class="col-md-3 col-sm-4  col-xs-6">
                <div class="block-stl2">
                    <div class="img-holder">
                        <img src="media/images/img13.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="txt-block">
                        <h3 class="fz22">${v.firstName + ' ' + v.lastname}</h3>
                         <a  class="btn" href="viewUserProfile.php?id=${v[2]}">Profile</a>
                         </p>
                   </div>
                    </div>
                </div>
            </div>`;
        });
}
function showIncomingLikes(data, persons){
    incontainer.innerHTML = `<h1 style="font-size: 30px;" id="heading">${persons} person like you</h1>`
    data.map((v, i) => {
        incontainer.innerHTML += `
            <div class="col-md-3 col-sm-4  col-xs-6">
                <div class="block-stl2">
                    <div class="img-holder">
                        <img src="media/images/img13.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="txt-block">
                    <h3 class="fz22">${v.firstName + ' ' + v.lastname}</h3>
                    <a  class="btn" href="viewUserProfile.php?id=${v[2]}">Profile</a>
                         </p>
                   </div>
                    </div>
                </div>
            </div>`;
  });
}

