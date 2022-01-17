import { serverHttpRequest } from "./utilities/serverHttpRequest.js";

let myMap = L.map('myMap').setView([55.694340, 12.548650], 13)
L.tileLayer(`https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}.png`, 
    {
        maxZoom: 18,
    }).addTo(myMap);
    let marker = L.marker([55.694340, 12.548650]).addTo(myMap)

function getContactDetails(){
    let firstName = document.getElementById("firstName").value;
    let lastName = document.getElementById("lastName").value;
    let email = document.getElementById("email").value;
    let number = document.getElementById("number").value;
    let message = document.getElementById("message").value;
    return {
        firstName: firstName,
        lastName: lastName,
        email: email,
        number: number,
        message: message
    };
}

async function sendContactform(){
    event.preventDefault();
    const data = await getContactDetails();
    const response = await serverHttpRequest('../api/contactform.php', 'POST', data);
    return (response) ? true : false;
}
document.querySelector('#contactform').addEventListener('submit', sendContactform);