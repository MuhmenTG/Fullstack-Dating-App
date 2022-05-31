import { checkSession } from "./utilities/checkSession.js";
import { getNotification, getRealTimeNotification } from "./notification.js";
import { modifyNotification, changeStatus } from "./notification.js";
async function authorizedNavbar() {
    const isLoggedIn = await checkSession();
    const loggedInNavbar = document.querySelector('.nav');
    const loggedInTopBar = document.querySelector('.topnav');
    if(isLoggedIn){
        const response = await getNotification();
    //    console.log(response);
        loggedInTopBar.innerHTML = ` 
                <div class="container">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="right-nav">

                                <span class="top-nav-signup_ligin"><a href="logout.php">logout</a> </span> 
                                <ul class="notification-drop">
                                <li class="item">
                                
                                  <i class="fa fa-bell-o notification-bell" aria-hidden="true"></i> <span class="btn__badge pulse-button">${response.length}</span>     
                                  <ul class="notficationsList">
                                    ${
                                      (response.length > 0) ? 
                                      (
                                        response.map((v,i) => {
                                          return `<li class="notfications"  data-userId="${v.userId}" data-notifyId="${v.notifyId}">${v.firstName} ${v.lastName} ${v.msg}</li>
                                          `
                                        })
                                      ) : (
                                        `<li class="notfications">No notification found</li>`
                                      )
                                    }
                                
                                  </ul>
                                </li>
                              </ul>                       
							</div>
						</div>
					</div>
				</div>`;

        loggedInNavbar.innerHTML = `
                <ul class="list-unstyled">
                
                    <li><a href="newUserProfilePage.php">My Account</a></li>
                    <li><a href="settings.php">My Settings</a></li>
                    <li><a href="search_partner.php">Explore</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="friend_request.php">Friend Requests</a></li>
                    <li><a href="favorite.php">Love&Likes</a></li>
                    <li><a href="chat.php">My messsages</a></li>

                  </ul>
                         
    `;
    modifyNotification(changeStatus)
    setInterval(getRealTimeNotification, 10000)
    setInterval(displayNotfication, 5000);
    
    }
    else{
        loggedInTopBar.innerHTML = `
        <div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="right-nav">
								<span class="top-nav-signup_ligin"><a href="#" data-target='#registerModal' data-toggle='modal'>Register</a> / <a href="#" data-target='#loginModal' data-toggle='modal'>Login</a></span>
							</div>
						</div>
					</div>
				</div>
        `;
        loggedInNavbar.innerHTML = `
        <ul class="list-unstyled">
            <li><a href="index.php">Home</a></li>
            <li><a href="search_partner.php">Explore</a></li>
            <li><a href="online_search_result.php">Online Users</a></li>    
            <li><a href="blog.php">Blog</a></li>
            <li><a href="about_us.php">About us</a></li>
            <li><a href="contact_us.php">Contact Us</a></li>
            <li><a href="shop.php">Under Construction</a></li>
        </ul>
 
        `;

    }

}

async function displayNotfication(){
  const response = await getNotification(); 
  document.querySelector(".btn__badge").innerHTML = `
  ${response.length}
  `
  document.querySelector(".notficationsList").innerHTML = `
  ${
    (response.length > 0) ? 
    (
      response.map((v,i) => {
        return `<li class="notfications"  data-userId="${v.userId}" data-notifyId="${v.notifyId}">${v.firstName} ${v.lastName} ${v.msg}</li>
        `
      })
    ) : (
      `<li class="notfications">No notification found</li>`
    )
  }
  `
}

authorizedNavbar();