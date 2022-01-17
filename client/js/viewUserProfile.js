import { serverHttpRequest } from './utilities/serverHttpRequest.js';
const urlParams = new URLSearchParams(window.location.search);
const userId = urlParams.get('id');
const about = document.querySelector("#about");
const userTableDetails = document.querySelector("#userTableDetails");
(!userId || userId < 0 || userId === "") ? location.href = "search_partner.php" : null;
 
async function getUserDetails(id)
{
    const response = await serverHttpRequest('../api/getUserDetails.php', 'POST', id, 'userID');
    await showUserDetails(response)
}
getUserDetails(userId) 

async function showUserDetails(response){
    about.innerHTML += 
    `
        <h4 class="profile-desc-title">About  ${response[0][1] + " " + response[0][2]}</h4>
        <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
    `;
    userTableDetails.innerHTML += 
    `
    <tbody>
    <tr>
        <td>
            <strong>
                Firstname
            </strong>
        </td>
        <td class="text-primary">
            ${response[0][1]}
         </td>
    </tr>
    <tr>
        <td>
            <strong>
                Lastname
            </strong>
        </td>
        <td class="text-primary">
             ${response[0][2]}
         </td>
    </tr>
    <tr>
        <td>
            <strong>
                Gender
            </strong>
        </td>
        <td class="text-primary">
            ${response[0][5]}
         </td>
    </tr>

    <tr>
        <td>
            <strong>
                Wished Preference Gender
            </strong>
        </td>
        <td class="text-primary">
            ${response[0][7]}
         </td>
    </tr>


    <tr>
        <td>
            <strong>
                Location
            </strong>
        </td>
        <td class="text-primary">
          ${response[0][8]}
         </td>
    </tr>
    <tr>
        <td>
            <strong>
                Age
            </strong>
        </td>
        <td class="text-primary">
            ${response[0][9]} years
         </td>
    </tr>
    <tr>
        <td>
            <strong>
                Height
            </strong>
        </td>
        <td class="text-primary">
        ${response[0][10]} cm
         </td>
    </tr>

    <tr>
        <td>
            <strong>
                Weight
            </strong>
        </td>
        <td class="text-primary">
        ${response[0][11]} kg
         </td>
    </tr>

    <tr>
        <td>
            <strong>
                Education
            </strong>
        </td>
        <td class="text-primary">
          ${response[0][12]}
         </td>
    </tr>

    <tr>
        <td>
            <strong>
                Religion
            </strong>
        </td>
        <td class="text-primary">
        ${response[0][13]}
         </td>
    </tr>

    <tr>
        <td>
            <strong>
                Marital Status
            </strong>
        </td>
        <td class="text-primary">
        ${response[0][14]}
         </td>
    </tr>

    <tr>
        <td>
            <strong>
                Smoking Status
            </strong>
        </td>
        <td class="text-primary">
        ${response[0][15]}
         </td>
    </tr>

    <tr>
        <td>
            <strong>
                Drinking Status
            </strong>
        </td>
        <td class="text-primary">
        ${response[0][16]}
         </td>
    </tr>

    <tr>
        <td>
            <strong>
                Have kids?
            </strong>
        </td>
        <td class="text-primary">
        ${response[0][17]}
         </td>
    </tr>

    <tr>
        <td>
            <strong>
              Eye color
            </strong>
        </td>
        <td class="text-primary">
        ${response[0][18]}
         </td>
    </tr>

    <tr>
        <td>
            <strong>
               Hair color
            </strong>
        </td>
        <td class="text-primary">
         </td>
    </tr>

    <tr>
        <td>
            <strong>
               Clothing Style
            </strong>
        </td>
        <td class="text-primary">
         </td>
    </tr>
    <tr>
        <td>
            <strong>
              Living Style
            </strong>
        </td>
        <td class="text-primary">
         </td>
    </tr>
</tbody>

    `;


}