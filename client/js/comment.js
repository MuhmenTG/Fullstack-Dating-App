import { blogId, showSingleBlogPost } from './singeBlogPage.js';
import { checkSession } from './utilities/checkSession.js';
import { serverHttpRequest } from './utilities/serverHttpRequest.js';
import { messageBox } from './utilities/message.js';
let emailField = document.getElementById('email'); 
let numberField = document.getElementById('number'); 
let commentField = document.getElementById('comment');

async function addComment(){
    event.preventDefault();
    let isLoggedIn = await checkSession();
    if(isLoggedIn){
        middleware();
    }
    else{
        swal("You have to login or register to comment");
    }
}
/*async function middleware(){ 
    const data = await getUserCommentInfo()
    const userid = await serverHttpRequest('../api/checkUserRecords.php', 'POST', {email: data.email})
    if(userid == "" || userid == undefined){
        messageBox(`#errormsg`, "block", "red", "User could not be found.");
    }
    else
    {
        const newData = {
            email: data.email,
            number: data.number,
            comment: data.comment,
            post_id: data.post_id,
            userid: userid.id,
        }
        const response = await serverHttpRequest('../api/addUserComment.php', 'POST', newData);
        swal("Comment added");
        if(response){
            showSingleBlogPost(data.post_id);
            clearInputField();
        }
    }
}*/
 async function middleware(){ 
    const data = await getUserCommentInfo()
    const response = await serverHttpRequest('../api/addUserComment.php', 'POST', {email: data.email})
    if(response == "" || response == undefined){
        messageBox(`#errormsg`, "block", "red", "User could not be found.");
    }
    else
    {
        const newData = {
            email: data.email,
            comment: data.comment,
            post_id: data.post_id,
            userid: userid.id,
        }
        const response = await serverHttpRequest('../api/addUserComment.php', 'POST', newData);
        swal("Comment added");
        if(response){
            showSingleBlogPost(data.post_id);
            clearInputField();
        }
    }
}

async function getUserCommentInfo(){
    let email = await emailField.value;
    let number = await numberField.value;
    let comment = await commentField.value;
    return{
        email:email,
        number:number,
        comment:comment,
        post_id: blogId
    }
};

function clearInputField(){
    emailField.value = "";
    numberField.value = "";
    commentField.value = "";
}

document.getElementById('submitComment').addEventListener('click',  addComment)
