import { HttpRequest } from './utilities/serverHttpRequest.js';

async function getLatestUser(){
    let data = await HttpRequest.server('../api/getLatestUsers.php', 'POST')
    await showLatestUsers(data);
}

function showLatestUsers(data){
    let comparedTime = new Date();
    let comparedDate = comparedTime.getDate();
    comparedTime = comparedTime.getHours() - 1;
    data.map((value, index) => {       
        let time = new Date(value.registeredAt)
        if(time.getHours() > comparedTime && comparedDate === time.getDate()){
           console.log(value);
        }
    })
}


getLatestUser();
