import { HttpRequest} from "./utilities/serverHttpRequest.js";
import { checkSession } from "./utilities/checkSession.js";
const peopleContainer = document.querySelector("#peopleContainer");

function getSearchParamValues() {
    let gender = document.getElementById("gender").value;
    let preference = document.getElementById("lookingfor").value;
    let location = document.getElementById("location").value;
    let ageInterval = document.getElementById("range_1").value;
    let heightInterval = document.getElementById("range_2").value;
    let weightInterval = document.getElementById("range_3").value;
    let education = document.getElementById("education").value;
    let socialstatus = document.getElementById("socialstatus").value;
    let work = document.getElementById("work").value;
    let maritalStatus = document.getElementById("maritalStatus").value;
    let smokingStatus = document.getElementById("smokingStatus").value;
    let drinkingStatus = document.getElementById("drinkingStatus").value;
    let age = ageInterval.split(";");
    let height = heightInterval.split(";");
    let weight = weightInterval.split(";")
    return {
        gender,
        preference,
        location,
        minAge: age[0],
        maxAge: age[1],
        minHeight: height[0],
        maxHeight: height[1],
        minWeight: weight[0],
        maxWeight: weight[1],
        education,
        socialstatus,
        work,
        maritalStatus,
        smokingStatus,
        drinkingStatus
    }

}

async function searchAdvanched() {
    event.preventDefault();
    const isLoggedIn = await checkSession();
    if(isLoggedIn){
        const data = await getSearchParamValues();
        const response = await HttpRequest.server("../api/advancedSearch.php", "POST", data);
        await showLimitedUserByDefault(response);
    }
    else{
        swal("You have be logged in to use this service");
    }
}

async function getLimitedUserByDefault() {
    const response = await HttpRequest.server("../api/getLatestUsers.php", "POST");
    console.log(response);
    await showLimitedUserByDefault(response);
}


function showLimitedUserByDefault(data) {

    peopleContainer.innerHTML = "";

    peopleContainer.innerHTML = `
    <div class="col-lg-12">
    <div class="title2">
        <h2 class="fz35">Search Result : 247</h2>
        <div class="clearfix"></div>
        <p class="fz20">Aliquam a neque tortor. Donec iaculis auctor turpis. Eporttitor<br> mattis ullamcorper urna. Cras quis elementum</p>
    </div>
    </div>
    `;

    data.map((v, i) => {
        peopleContainer.innerHTML += `
  
        <div class="col-md-3 col-sm-4  col-xs-6">
            <div class="block-stl2">
                <div class="img-holder">
                    <img src="media/images/img13.jpg" alt="" class="img-responsive">
                </div>
                <div class="txt-block">
                    <h3 class="fz22">${v[1] + ' ' + v[2]}</h3>
                    <p> ${v[5]} / ${v[9]} / ${v[8]}	</p>
                    <button class="c-btn btn1" onclick="viewDetails(${v[0]})">See full Details</button>
                    </a>
                </div>
            </div>
        </div>

`;
    });
    peopleContainer.innerHTML += `
  
        <div class="col-lg-12">
        <div class="text-center">
            <a href="#" class="c-btn btn1"> View More</a>
        </div>
        </div>
 `;


}

window.viewDetails = async (userId) => {
    const isLoggedIn = await checkSession()
    (!isLoggedIn) ? $("#loginModal").modal() : location.href = `viewUserProfile.php?id=${userId}`; 
}

document.querySelector("#searchForm").addEventListener("submit", searchAdvanched);

(peopleContainer != null) ? getLimitedUserByDefault() : null;

