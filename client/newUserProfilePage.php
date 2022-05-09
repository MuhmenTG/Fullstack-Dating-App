<?php 
include('inc/redirect.php');
include('inc/top.php');
include('inc/header.php');
?>

<main class="main">


    <section class="main-section">
        <div class="profileInfo" id="profileInfo">
            <section class="progress-section">
                <div class="progress">
                    <div class="bar shadow overlap"></div>
                </div>
            </section>
            <div class="basicInfo">
                <h2 class="basicInfo_heading">Base Info</h2>
                <hr />
                <div class="basic_info_group">
                    <div>Firstname</div>
                    <div><input type="text" id="firstName"></div>
                </div>
                <div class="basic_info_group">
                    <div>Lastname</div>
                    <div><input type="text" id="lastName"></div>
                </div>
                <div class="basic_info_group">
                    <div>Gender</div>
                    <div>
                        <select class="select" name="gender" id="gender">
                            <option value="" disabled selected>Choose Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="basic_info_group">
                    <div>Age:</div>
                    <div>
                        <select class="select" name="userAge" id="userAge">
                            <option value="" disabled selected>Choose Age</option>

                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Height</div>
                    <div>
                        <select class="select" name="userHeight" id="userHeight">
                            <option value="" disabled selected>Choose Height</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Weight:</div>
                    <div>
                        <select class="select" name="userWeight" id="userWeight">
                            <option value="" disabled selected>Choose weight</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="basicInfo">
                <h2 class="basicInfo_heading">Additional Info</h2>
                <hr />
                <div class="basic_info_group">
                    <div>Education:</div>
                    <div>
                        <select class="select" name="userMaximumEducation" id="userMaximumEducation">
                            <option value="" disabled selected>Choose Education</option>
                            <option value="high school education">high school education</option>
                            <option value="university education">university education</option>
                            <option value="Technical">Technical</option>
                            <option value="Academic">Academic</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Religion:</div>
                    <div>
                        <select class="select" name="userReligion" id="userReligion">
                            <option value="" disabled selected>Choose Religion</option>
                            <option value="Islam">Islam</option>
                            <option value="Hinduism">Hinduism</option>
                            <option value="Christianity">Christianity</option>
                            <option value="Jews">Jews</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Marital Status:</div>
                    <div>
                        <select class="select" name="userMaritalStatus" id="userMaritalStatus">
                            <option value="" disabled selected>Choose Marital Status</option>
                            <option value="Single">Single</option>
                            <option value="married">married</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Smoking Status:</div>
                    <div>
                        <select class="select" name="userSmokingStaus" id="userSmokingStaus">
                            <option value="" selected>Choose Smoking status</option>
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                            <option value="Sometimes">Sometimes</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Drinking Status:</div>
                    <div>
                        <select class="select" name="userDrinkingStatus" id="userDrinkingStatus">
                            <option value="" selected>Choose Smoking status</option>
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                            <option value="Sometimes">Sometimes</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Parent Status:</div>
                    <div>
                        <select class="select" name="userParentStatus" id="userParentStatus">
                            <option value="" selected>Do you have kids?</option>
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                            <option value="I want to">I want to</option>
                            <option value="Coming..">Coming</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Eye color:</div>
                    <div>
                        <select class="select" name="userEyeColor" id="userEyeColor">
                            <option value="" selected>Choose eye color</option>
                            <option value="Amber">Amber</option>
                            <option value="Blue">Blue</option>
                            <option value="Brown">Brown</option>
                            <option value="Gray">Gray</option>
                            <option value="Green">Green</option>
                            <option value="Hazel">Hazel</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Hair Color:</div>
                    <div>
                        <select class="select" name="userHairColor" id="userHairColor">
                            <option value="" selected>Choose hair color</option>
                            <option value="Blonde hair">Blonde hair</option>
                            <option value="Brown hair">Brown hair</option>
                            <option value="Black hair">Black hair</option>
                            <option value="Red hair">Red hair</option>
                            <option value="Grey hair">Grey hair</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Clothing Style:</div>
                    <div>
                        <select class="select" name="userClothingStyle" id="userClothingStyle">
                            <option value="" disabled selected>Choose your style of clothing</option>
                            <option value="Classic">Classic</option>
                            <option value="Old School">Old School</option>
                            <option value="Newest">The Newest</option>
                            <option value="Goth">Goth</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="basicInfo">
                <h2 class="basicInfo_heading">My Ideal candidate</h2>
                <hr />
                <div class="basic_info_group">
                    <div>Gender :</div>
                    <div>
                        <select class="select" name="sexOfPotentialCandidate" id="sexOfPotentialCandidate">
                            <option value="" disabled selected>Choose gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Min age:</div>
                    <div>
                        <select class="select" name="minAgeOfPotentialCandidate" id="minAgeOfPotentialCandidate">
                            <option value="" disabled selected>Choose min. age</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Max age</div>
                    <div>
                        <select class="select" name="maxAgeOfPotentialCandidate" id="maxAgeOfPotentialCandidate">
                            <option value="" disabled selected>Choose max. age</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Min Height:</div>
                    <div>
                        <select class="select" name="minHeightOfPotentialCandidate" id="minHeightOfPotentialCandidate">
                            <option value="" disabled selected>Choose min. height</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Max height:</div>
                    <div>
                        <select class="select" name="maxHeightOfPotentialCandidate" id="maxHeightOfPotentialCandidate">
                            <option value="" disabled selected>Choose max. height</option>
                        </select>
                    </div>
                </div>

                <div class="basic_info_group">
                    <div>Min Wight:</div>
                    <div>
                        <select class="select" name="minWeightOfPotentialCandidate" id="minWeightOfPotentialCandidate">
                            <option value="" disabled selected>Choose min. weight</option>

                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Max Weight:</div>
                    <div>
                        <select class="select" name="maxWeightOfPotentialCandidate" id="maxWeightOfPotentialCandidate">
                            <option value="" disabled selected>Choose max. weight</option>

                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>City living in:</div>
                    <div>
                        <select class="select" name="cityOfPotentialCandidate" id="cityOfPotentialCandidate">
                            <option value="" disabled selected>Choose city</option>
                            <option value="Oslo">Oslo</option>
                            <option value="Copenhagen">Copenhagen</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Marital Statua:</div>
                    <div>
                        <select class="select" name="wishedStatusPotentialCandidate"
                            id="wishedStatusPotentialCandidate">
                            <option value="" disabled selected>Choose Marital Status</option>
                            <option value="Single">Single</option>
                            <option value="married">married</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Religion:</div>
                    <div>
                        <select class="select" name="religionOfPotentialCandidate" id="religionOfPotentialCandidate">
                            <option value="" disabled selected>Choose Religion</option>
                            <option value="Islam">Islam</option>
                            <option value="Hinduism">Hinduism</option>
                            <option value="Christianity">Christianity</option>
                            <option value="Jews">Jews</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Smoking Status</div>
                    <div>
                        <select class="select" name="smokingStatusOfPotentialCandidate"
                            id="smokingStatusOfPotentialCandidate">
                            <option value="" selected>Choose Smoking status</option>
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                            <option value="Sometimes">Sometimes</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Eye color:</div>
                    <div>
                        <select class="select" name="eyeColorOfPotentialCandidate" id="eyeColorOfPotentialCandidate">
                            <option value="" selected>Choose eye color</option>
                            <option value="Amber">Amber</option>
                            <option value="Blue">Blue</option>
                            <option value="Brown">Brown</option>
                            <option value="Gray">Gray</option>
                            <option value="Green">Green</option>
                            <option value="Hazel">Hazel</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Hair Color:</div>
                    <div>
                        <select class="select" name="hairColorOfPotentialCandidate" id="hairColorOfPotentialCandidate">
                            <option value="" selected>hair color</option>
                            <option value="Amber">Amber</option>
                            <option value="Blue">Blue</option>
                            <option value="Brown">Brown</option>
                            <option value="Gray">Gray</option>
                            <option value="Green">Green</option>
                            <option value="Hazel">Hazel</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Body Style</div>
                    <div>
                        <select class="select" name="bodyOfPotentialCandidate" id="bodyOfPotentialCandidate">
                            <option value="" disabled selected> Select physique </option>
                            <option value="Thin"> Thin </option>
                            <option value="Normal"> Normal </option>
                            <option value="Well-trained"> Well-trained </option>
                            <option value="Overweight"> Overweight </option>
                            <option value="Other"> Other </option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Appearance:</div>
                    <div>
                        <select class="select" name="apperanceOfPotentialCandidate" id="apperanceOfPotentialCandidate">
                            <option value="" disabled selected> Select Appearance </option>
                            <option value="Very attractive"> Very attractive </option>
                            <option value="Attractive"> Attractive </option>
                            <option value="Medium"> Medium </option>
                            <option value="Not relevant or important"> Not relevant or important </option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Clothing:</div>
                    <div>
                        <select class="select" name="clothingOfPotentialCandidate" id="clothingOfPotentialCandidate">
                            <option value="" disabled selected> Select clothing style </option>
                            <option value="Classic"> Classic </option>
                            <option value="Old School"> Old School </option>
                            <option value="Branded"> Branded </option>
                            <option value="Goth"> Goth </option>
                            <option value="Other"> Other </option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Body Art</div>
                    <div>
                        <select class="select" name="BodyArtOfPotentialCandidat" id="BodyArtOfPotentialCandidat">
                            <option value="" disabled selected> Select Body Decoration </option>
                            <option value="Piercing"> Piercings </option>
                            <option value="Tattoo"> Tattoo </option>
                        </select>
                    </div>
                </div>

                <div class="basic_info_group">
                    <div>Education:</div>
                    <div>
                        <select class="select" name="educationOfPotentialCandidate" id="educationOfPotentialCandidate">
                            <option value="" disabled selected>Choose Education</option>
                            <option value="high school education">high school education</option>
                            <option value="university education">university education</option>
                            <option value="Technical">Technical</option>
                            <option value="Academic">Academic</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>



                <div class="basic_info_group">
                    <div>Job:</div>
                    <div>
                        <select class="select" name="jobOfPotentialCandidate" id="jobOfPotentialCandidate">
                            <option value="" disabled selected> Select Employment </option>
                            <option value="Information Technology"> Information Technology </option>
                            <option value="Engineering and Engineering"> Engineering and Engineering </option>
                            <option value="Management and Staff"> Management and Staff </option>
                            <option value="Trade and service"> Trade and service </option>
                            <option value="Social and health"> Social and health </option>
                            <option value="Office and Finance"> Office and Finance </option>
                            <option value="Sales and Communications"> Sales and Communications </option>
                            <option value="Other"> Other </option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Living Style:</div>
                    <div>
                        <select class="select" name="livingStyleOfPotentialCandidate"
                            id="livingStyleOfPotentialCandidate">
                            <option value="" disabled selected> Select your Housing situation </option>
                            <option value="College"> College </option>
                            <option value="Own house"> Own house </option>
                            <option value="Condominium"> Condominium </option>
                            <option value="Condominium"> Condominium </option>
                            <option value="Other"> Other </option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Vechile</div>
                    <div>
                        <select class="select" name="vehicleOfPotentialCandidate" id="vehicleOfPotentialCandidate">
                            <option value="" disabled selected> Select your transportation </option>
                            <option value="Have a car"> Have a car </option>
                            <option value="Do not have a house"> Do not have a car </option>
                            <option value="Cycle"> Cycle </option>
                            <option value="Motorcycle"> Motorcycle </option>
                            <option value="Other"> Other </option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Number of children</div>
                    <div>
                        <select class="select" name="numOfChildrenOfPotentialCandidate"
                            id="numOfChildrenOfPotentialCandidate">
                            <option value="" disabled selected> number of children </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Income</div>
                    <div>
                        <select class="select" name="monthlyIncomeOfPotentialCandidate"
                            id="monthlyIncomeOfPotentialCandidate">

                            <option value="Mindre end 3000 kr,-">more then 3000</option>
                            <option value="5.000-10.000 kr,-">5.000-10.000 kr,-</option>
                            <option value="10.000-15.000 kr,-">10.000-15.000 kr,-</option>
                            <option value="15.000-25.000 kr,-">15.000-25.000 kr,-</option>
                            <option value="25.000-30.000 kr,-">25.000-30.000 kr,-</option>
                            <option value="30.000-35.000 kr,-">30.00i0-35.000 kr,-</option>
                            <option value="30.000-35.000 kr,-">30.000-35.000 kr,-</option>
                            <option value="35.000-40.000 kr,-">35.000-40.000 kr,-</option>
                            <option value="40.000-45.000 kr,-">40.000-45.000 kr,-</option>
                            <option value="45.000-50.000 kr,-">45.000-50.000 kr,-</option>
                            <option value="+50.000 kr,-">+50.000 kr,-</option>
                            <option value="Ønskes ikke at informere">Ønskes ikke at informere</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="settingsection" id="settingsection">

           


    </section>
</main>
<div class="online-side-nav">
			<span class="nav-btn">
				<a href="#"><i class="flaticon-left-arrow"></i></a>
			</span>
			<div id="chat-sidebar">

				<div class="sidebar-user-box" id="100" >
					<img src="media/images/ou1.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette"></i>
					<span class="slider-username">Sumit Kumar Pradhan </span>
				</div> 

				<div class="sidebar-user-box" id="101" >
					<img src="media/images/ou2.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette active"></i>
					<span class="slider-username">Skptricks </span>
				</div> 

				<div class="sidebar-user-box" id="102" >
					<img src="media/images/ou3.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette"></i>
					<span class="slider-username">Amit Singh </span>
				</div> 

				<div class="sidebar-user-box" id="103" >
					<img src="media/images/ou4.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette active"></i>
					<span class="slider-username">Neeraj Tiwari </span>
				</div> 

				<div class="sidebar-user-box" id="104"  >
					<img src="media/images/ou5.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette active"></i>
					<span class="slider-username">Sorav Singh </span>
				</div> 

				<div class="sidebar-user-box" id="105" >
					<img src="media/images/ou6.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette active"></i>
					<span class="slider-username">Lokesh Singh </span>
				</div> 

				<div class="sidebar-user-box" id="106" >
					<img src="media/images/ou7.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette"></i>
					<span class="slider-username">Tony </span>
				</div> 

				<div class="sidebar-user-box" id="107" >
					<img src="media/images/ou8.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette active"></i>
					<span class="slider-username">Alex Robby </span>
				</div> 

				<div class="sidebar-user-box" id="108" >
					<img src="media/images/ou9.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette"></i>
					<span class="slider-username">Pragaya Mishra </span>
				</div> 

				<div class="sidebar-user-box" id="109" >
					<img src="media/images/ou2.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette active"></i>
					<span class="slider-username">Abhishek Mishra </span>
				</div> 
			 
			</div>
		</div>




<!-- Plugins -->
<?php include('inc/footer.php')?>
<!-- Include jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugins -->
<script src="js/plugins.js"></script>
<!-- Googleapis -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBP1lPhUhDU6MINpruPDinAzXffRlpzzFo"></script>
<!-- Custom -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/navbar.js" type="module"></script>
<script src="js/progressbar.js" type="module"></script>
<script src="js/profileSettings.js" type="module"></script>
<script src="js/dropdowns.js"></script>