import { serverHttpRequest } from './utilities/serverHttpRequest.js';
import { messageBox } from './utilities/message.js'

const firstName = document.getElementById("firstname") 
const lastName = document.getElementById("lastname") 
const emailAddress = document.getElementById("emailaddress") 
const userPassword = document.getElementById("password")
const userConfirmedpassword = document.getElementById("confirmedpassword");
const userGender = document.getElementById("usergender")


const regExpression = /^[a-zA-Z]{5,15}$/;
const emailRegExpression = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
const passwordRegExpression = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{10,20}$/;
function getRegistrationDetails(){
    let firstname = firstName.value;
    let lastname = lastName.value;
    let emailaddress = emailAddress.value;
    let password = userPassword.value;
    let gender = userGender.value
    return {
        firstname,
        lastname,
        emailaddress,
        password,
        gender
    };
}

firstName.oninput = function() {checkInputFirstName()};
function checkInputFirstName(){
    if (!firstName.value.match(regExpression)) 
    { 
        messageBox("#firstnamemessage", "block", "red", "Firstname must only include alphanumeric letters and be between 5 and 15 letters.");
    }
    else
    {  
       messageBox("#firstnamemessage", "block", "green", "Accepted.");
    }
}
lastName.oninput = function() {checkInputLastName()}
function checkInputLastName(){
    if (!lastName.value.match(regExpression)) 
    {
        messageBox("#lastnamemessage", "block", "red", "Lastname must only include alphanumeric letters and be between 5 and 15 letters.");
    }
    else
    {
        messageBox("#lastnamemessage", "block", "green", "Accepted.");
    }
}
emailAddress.oninput = function() {checkInputEmailaddress()}
function checkInputEmailaddress(){
    if (!emailAddress.value.match(emailRegExpression)) 
    {
        messageBox("#emailaddressmessage", "block", "red", "Invalid email.");
    }
    else
    {
        messageBox("#emailaddressmessage", "block", "green", "Accepted.");
    } 
}
userPassword.oninput = function() {checkInputPassword()}
function checkInputPassword(){
    if(!userPassword.value.match(passwordRegExpression)){
        messageBox("#passwordrequired", "block", "red", "Password must be more than 10 characters, including one lowercase, one uppercase letter & numeric value.");
    }
    else{
        messageBox("#passwordrequired", "block", "green", "Accepted.");
    }
}
userConfirmedpassword.oninput = function() {checkMatchPassword()}
function checkMatchPassword(){
    if (userPassword.value != userConfirmedpassword.value) {
        messageBox("#confirmedpasswordRequired", "block", "red", "Passwords not matches.");
    }
    else{
        messageBox("#confirmedpasswordRequired", "block", "green", "Password matches.");
    }
}

async function registerUser(){
    const data = await getRegistrationDetails();
    const response = await serverHttpRequest('../api/registerNewUser.php', 'POST', data);
    switch(response) {
        case  -1:
            swal("This user already exist.");
            break;
        case 0:
            swal("Registration of user faild. Something went wrong.");
            break;
        case 1:
            swal("A verificationlink has been sent to your email. Please check and follow the instructions") ;
            break;
        default:
           break;
    }
}

function validateRegistrationForm(){
    event.preventDefault();
    registerUser();
}

document.querySelector("#registerdiv").addEventListener('submit', validateRegistrationForm)
