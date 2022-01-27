import { serverHttpRequest } from "./utilities/serverHttpRequest.js";
const blogContainer = document.getElementById('insideContainerBlog');
const searchPost = document.getElementById("searchPost");
async function showBlogPost(name){
    let data = "";
    if(name != undefined){      
        data = await serverHttpRequest('../api/blogSearch.php', 'POST', name)
        console.log(data);
    }
    else{
        data = await serverHttpRequest('../api/allBlogs.php', 'POST')
    }
    await viewFetchedBlogData(data)
}
showBlogPost()
searchPost.oninput = function() {showBlogPost(searchPost.value)}
//Showing the fetched data from fetchblogData
function viewFetchedBlogData(data){
    blogContainer.innerHTML =  '';
    //Checking if the data is empty
    if(data === null  || data === undefined ){
        blogContainer.innerHTML =  'No post found';
    }
    else
    {  
        data.map((v, i) => {        
            blogContainer.innerHTML +=  
              `<div class="col-lg-12" id="col-lg-12">
                <div class="blogs">
                    <div class="img-holder">
                     </div>
                    <div class="blog-txt">
                        <div class="inner-txt-block">
                            <a href="#"><h2>${v.heading}</h2></a>
                            <ul class="list-unstyled profile-contact">
                                <li><a href="#"><i class="fa fa-user"></i>${v.firstName + ' ' + v.lastName}</a></li>
                                <li><a href="#"><i class="fa fa-clock-o"></i>${v.createdDate}</a></li>
                              
                                <li><a href="#"><i class="fa fa-comment-o"></i>66</a></li>
                            </ul>
                            <p>${v.shortDescription}</p>
                            <a href="blog_single.php?id=${v.id}" class='c-btn btn1'>Read More</a>
                        </div>
                    </div>
                </div>
            </div>`;     
        }) ;
    }
}



