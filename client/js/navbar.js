import { checkSession } from "./utilities/checkSession.js";
 
async function authorizedNavbar() {
    const isLoggedIn = await checkSession();
    const loggedInNavbar = document.getElementById('loggedInNav');
    if(isLoggedIn){
        loggedInNavbar.innerHTML = ` 
                    <nav class="nav">
                            <ul class="list-unstyled">
                            <li>
                            <a  href="viewMyProfile.php">Testing...</a>

                            </li>
                                <li class="drop"><a href="#">My Actions</a>
                                    <ul class="drop-down" style="display: none;">

                                        <li>
                                            <a style="color:black;" href="myProfileEdit.php">Edit My Profile</a>
                                        </li>
                                        <li>
                                            <a style="color:black;" href="viewMyProfile.php">View My Profile</a>

                                        </li>
                                        <li>
                                            <a style="color:black;" href="accountSettings.php">Change Email &
                                                Name</a>
                                        </li>
                                        <li>
                                            <a style="color:black;" href="accoutSettings(Password).php">Change
                                                Password </a>
                                        </li>
                                        <li>

                                            <a style="color:black;" href="profileSettings.php">My Profile
                                                Settings</a>
                                        </li>
                                        <li>

                                            <a style="color:black;" href="logout.php">Logout</a>
                                        </li>

                                    </ul>
                                </li>
                                <li><a href="search_partner.php">Explore</a></li>

                                <li><a href="online_search_country.php">Countries</a></li>

                                <li><a href="blog.php">Blog</a></li>
                                <li><a href="about_us.php">About us</a></li>
                                <li><a href="contact_us.php">Contact Us</a></li>
                                <li><button> your button that looks like a link</button></li>
                            </ul>
                        </nav>
    `;
    }
    else{
        loggedInNavbar.innerHTML = `
        <nav class="nav">
        <ul class="list-unstyled">
            <li><a href="index.php">Home</a></li>
            <li><a href="search_partner.php">Explore</a></li>
            <li><a href="online_search_result.php">Online Users</a></li>    
            <li><a href="blog.php">Blog</a></li>
            <li><a href="about_us.php">About us</a></li>
            <li><a href="contact_us.php">Contact Us</a></li>
            <li><a href="shop.php">Under Construction</a></li>
        </ul>
    </nav>
        
        `;
    }
   
}

authorizedNavbar();