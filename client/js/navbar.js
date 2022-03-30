import { checkSession } from "./utilities/checkSession.js";
 
async function authorizedNavbar() {
    const isLoggedIn = await checkSession();
    const loggedInNavbar = document.querySelector('.nav');
    const loggedInTopBar = document.querySelector('.topnav');
    if(isLoggedIn){

        loggedInTopBar.innerHTML = ` 
                <div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="right-nav">
                                <span class="top-nav-signup_ligin"><a href="logout.php">logout</a> </span> 
								<a href="#" class="support-num">Support Number : +1 (123 ) 456 789</a>
							</div>
						</div>
					</div>
				</div>`;

        loggedInNavbar.innerHTML = `
                <ul class="list-unstyled">
                    <li><a href="newUserProfilePage.php">My Account</a></li>
                    <li><a href="settings.php">My Settings</a></li>
                    <li><a href="search_partner.php">Explore</a></li>
                    <li><a href="suggest_candidates.php">Found Matches</a></li>
                    <li><a href="friend_request.php">Friend Requests</a></li>
                    <li><a href="favorite.php">Love&Likes</a></li>
                    <li><a href="chat.php">My messsages</a></li>

                  </ul>
                         
    `;
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

authorizedNavbar();