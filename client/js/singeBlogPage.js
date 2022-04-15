import { getCurrentSessionId } from './utilities/checkSession.js';
import { HttpRequest} from "./utilities/serverHttpRequest.js";
//const sliderPost = document.querySelector(".b_slider");
let commentId;
let userId;
export const blogId = new URLSearchParams(window.location.search).get("id");
if (!blogId || blogId < 0 || blogId === "") {
    location.replace('blog.php');
}

export async function showSingleBlogPost(blogID) {
    const response = await HttpRequest.server('../api/Blogs/getSingleBlogDetails.php', 'POST', { blogID });
    await displaySinglePost(response[0], response[2].length)
    userId = await getCurrentSessionId();
    await displayCommentPost(response[2], userId)
    //await displayCarouselPost(data[1]);
}
showSingleBlogPost(blogId)

function displaySinglePost(data, comments) {
    data.map((v, i) => {
        document.querySelector('.single-blog-wrapper').innerHTML = `
        <div class="blog-txt">
        <div class="inner-txt-block">
                <h2>${v[3]}</h2>
        <br />
            <ul class="list-unstyled profile-contact">
                <li><a href="#"><i class="fa fa-user"></i>${v[6]}</a></li>
                <br />
                <li><a href="#"><i class="fa fa-clock-o"></i>${v[5]}</a></li>
                <br />
                <li><a href="#"><i class="fa fa-comment-o"></i>${comments}</a></li>

        <br />
        <br />
                <li>${v[4]}</li>

            </ul>
    
        </div>
    </div>
    `
    })
}

/*function displayCarouselPost(data){

    sliderPost.innerHTML  = "";
    
    data.map((v, i) => {
        
    sliderPost.innerHTML  += `
         <div class="item">
            <div class="block-stl8">
                <div class="img-holder">
                    <img src="media/images/img95.jpg" alt="" class="img-responsive">
                </div>
                <div class="txt-block">
                    <h4><a href="#">Nulla facilisis nisl vitvolutpat placerat. Pellent habitant
                            morbi tristique .</a></h4>
                    <p>Sed iaculis ligula ut magna dignissim, et cursus lorem faucibus. Nullam porta
                        mi ac erat venenatis.</p>
                </div>
            </div>
        </div>
      
 
            `;

        
    })  
}*/

function displayCommentPost(data, userId) {
    document.querySelector('.comments-block').innerHTML = `<h2>Comments  ${data.length}:</h2>`;
    data.map((v, i) => {
        if (v[2] == userId) {
            document.querySelector('.comments-block').innerHTML += `
            <div class="comment-box new-block">
            <div class="img-block">
                <div class="img-holder">
                    <img src="media/images/img98.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="comment">
                <p>${v[0]}</p>
                <div class="about-commenter">
                    <p><span>${v[4]}</span> - ${v[5]}
                    <a href="#" class="replay-btn"><i class="fa fa-share"></i>replay</a>
                    <button class="delete-btn" data-delete="${v[1]}" data-userId="${v[2]}"><i class="fa fa-trash"></i></button>
                    <a style="color: black;" href="#" data-target='#updateModal' data-toggle='modal' class="update-btn" data-update="${v[1]}" data-userId="${v[2]}"><i class="fa fa-pencil"></i>Edit</a>
                    </p>
                </div>
            </div>
            </div>
            <div class="replied new-block">
                <div class="comment-box new-block">
                    <div class="img-block">
                        <div class="img-holder">
                            <img src="media/images/img99.jpg" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="comment">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor aliquam nulla,
                            eu tempor felis elementum eget. In dapibus pharetra dignissim. Nam mattis odio nisl,
                            eget imperdiet.</p>
                        <div class="about-commenter">
                            <p><span>John Deo</span> - 2 Day Ago <a href="#" class="replay-btn"><i
                                        class="fa fa-share"></i> replay</a></p>
                        </div>
                    </div>
                </div>
            </div>
                <hr class="hr new-block">`
        } else {
            document.querySelector('.comments-block').innerHTML += `
            <div class="comment-box new-block">
            <div class="img-block">
                <div class="img-holder">
                    <img src="media/images/img98.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="comment">
                <p>${v[0]}</p>
                <div class="about-commenter">
                    <p><span>${v[4]}</span> - ${v[5]}
                    <a href="#" class="replay-btn"><i class="fa fa-share"></i>replay</a>
                     </p>
                </div>
            </div>
            </div>
            <div class="replied new-block">
                <div class="comment-box new-block">
                    <div class="img-block">
                        <div class="img-holder">
                            <img src="media/images/img99.jpg" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="comment">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor aliquam nulla,
                            eu tempor felis elementum eget. In dapibus pharetra dignissim. Nam mattis odio nisl,
                            eget imperdiet.</p>
                        <div class="about-commenter">
                            <p><span>John Deo</span> - 2 Day Ago <a href="#" class="replay-btn"><i
                                        class="fa fa-share"></i> replay</a></p>
                        </div>
                    </div>
                </div>
            </div>
                    <hr class="hr new-block">`
        }

    })
    if(userId){
        document.querySelector('.block').innerHTML =  `
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title2">
                        <h2 class="fz35">Leave & Reply</h2>
                        <div class="clearfix"></div>

                    </div>
                </div>
                <div class="col-lg-12">
                    <form id="addComment">
                        <div class="row">
                            <span id="errormsg"></span>
                        </div>
                        <div class="row">                    
                            <div class="col-lg-12">
                                <div class="from-group">
                                    <textarea class="form-control" id="comment"
                                        placeholder="Type your comment.."></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="from-group">
                                    <button class="c-btn btn1">Send</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        `;
    }
    else{
        document.querySelector('.block').innerHTML =  `
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title2">
                        <h2 class="fz35">Leave & Reply</h2>
                        <div class="clearfix"></div>
                        <p class="fz20">Register or login to leave a comment</p>
                        <a href="">Login</a>
                    </div>
                </div>
                
            </div>
        </div>
        `;
    }
 

    document.querySelector("#addComment").addEventListener('submit', addComment)
    modifyComment(data, "delete-btn", "data-delete", checkUserBeforeModity);
    modifyComment(data, "update-btn", "data-update", checkUserBeforeModity);
}

function modifyComment(data, btnClass, btnDataName, callback, btnUserId = "data-userId") {
    var mButtons = document.getElementsByClassName(btnClass);
    for (let i = 0; i < mButtons.length; i++) {
        mButtons[i].addEventListener("click", function () {
        (btnClass === "delete-btn") ?  callback(this.getAttribute(btnDataName), this.getAttribute(btnUserId)) : callback(this.getAttribute(btnDataName), this.getAttribute(btnUserId), data) 
        });
    }
}


async function addComment(){
    event.preventDefault();
    const comment = document.getElementById("comment").value;
    const commentInfo = {comment: comment, blogId: blogId, userId: userId};
    const response = await HttpRequest.server('../api/Comments/addUserComment.php', 'POST', commentInfo);
    if(response.status = 200){
      showSingleBlogPost(blogId)
    }
}

async function checkUserBeforeModity(cId, userId, data){
    const currentSessionUserId = await getCurrentSessionId();
    commentId = parseInt(cId);
    if (currentSessionUserId == userId) {
        (data == undefined) ? getComment(commentId, userId) : postComment(commentId, data)
    } 
}

async function getComment(commentId, userId) {
    const response = await HttpRequest.server('../api/Comments/deleteUserComment.php', 'POST', {commentId, userId})
    if (response) {
        await showSingleBlogPost(blogId)
        return;
    }
    return false;
}

async function postComment(commentId, data) {
    for (let i = 0; i < data.length; i++) {
        let commentData = data[i];
        (commentId == commentData[1]) ? document.getElementById('editComment').innerHTML = `${commentData[0]}` : null;
    }
}

async function postNewComment() {
    event.preventDefault();
    const message = await document.getElementById('editComment').value;
    const data = {
        commentId,
        message
    }
    const response = await HttpRequest.server('../api/Comments/editUserComment.php', 'POST', data)
    if(response[0]) {
        $('#updateModal').modal('hide');
        showSingleBlogPost(blogId)
    }
    return;
}


document.querySelector("#updateform").addEventListener('submit', postNewComment)