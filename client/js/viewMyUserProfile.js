import {
    fetchDetails
} from './utilities/fetchApiData.js';
let loggedInUser = document.getElementById('id').value;
console.log(loggedInUser);
async function getProfileDetails(id) {
    let data = await fetchDetails('../api/getUserDetails.php', 'POST', 'userID', id);
    console.log(data);
    await displaySettingsInfo(data)
    // await displayProfileInfo(data)
}
getProfileDetails(loggedInUser)

//Settings section
function displaySettingsInfo(data) {
    let userEmail = data[0].email;
    let firstName = data[0].firstName;
    let lastName = data[0].lastName;

    let inputFieldEmail = document.getElementById("email");
    let inputFieldfirstname = document.getElementById("firstname");
    let inputFieldlastname = document.getElementById("lastname");
    inputFieldEmail.value = userEmail;
    inputFieldfirstname.value = firstName;
    inputFieldlastname.value = lastName;
}