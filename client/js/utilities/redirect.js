const urlParams =  new URLSearchParams(window.location.search);
const isloggedOut =  urlParams.get('isLoggedOut');
if(isloggedOut){
    swal("You have signed out.")
}