<?php 
include('inc/redirect.php');
include('inc/top.php');
include('inc/header.php');
?>

<main class="main">
    <section class="top">
        <nav class="profile-nav">
            <ul>
                <li><a href="#profile">Profile</a></li>
                <li><a href="#settings">Settings</a></li>
            </ul>
        </nav>
    </section>
    <section class="main-section">
        <div class="profileInfo">
            <div class="basicInfo">
                <h2 class="basicInfo_heading">Base Info</h2>
                <hr />
                <div class="basic_info_group">
                    <div class="basicInfo_heading">Firstname</div>
                    <div>Muhmen</div>
                </div>
                <div class="basic_info_group">
                    <div>Lastname</div>
                    <div>Parvaze</div>
                </div>
                <div class="basic_info_group">
                    <div>Gender</div>
                    <div>Men</div>
                </div>

                <div class="basic_info_group">
                    <div>Age:</div>
                    <div>
                        <select class="select" name="userAge" id="userAge">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Height</div>
                    <div>
                        <select class="select" name="userHeight" id="userHeight">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Weight:</div>
                    <div>
                        <select class="select" name="userWeight" id="userWeight">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
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
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Religion:</div>
                    <div>
                        <select class="select" name="userReligion" id="userReligion">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Marital Status:</div>
                    <div>
                        <select class="select" name="userMaritalStatus" id="userMaritalStatus">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Smoking Status:</div>
                    <div>
                        <select class="select" name="userSmokingStaus" id="userSmokingStaus">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Drinking Status:</div>
                    <div>
                        <select class="select" name="userDrinkingStatus" id="userDrinkingStatus">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Parent Status:</div>
                    <div>
                        <select class="select" name="userParentStatus" id="userParentStatus">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Eye color:</div>
                    <div>
                        <select class="select" name="userEyeColor" id="userEyeColor">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Hair Color:</div>
                    <div>
                        <select class="select" name="userHairColor" id="userHairColor">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Clothing Style:</div>
                    <div>
                        <select class="select" name="userClothingStyle" id="userClothingStyle">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
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
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Min age:</div>
                    <div>
                        <select class="select" name="sexOfPotentialCandidate" id="sexOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Max age</div>
                    <div>
                        <select class="select" name="maxAgeOfPotentialCandidate" id="maxAgeOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Min Height:</div>
                    <div>
                        <select class="select" name="minHeightOfPotentialCandidate" id="minHeightOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Max height:</div>
                    <div>
                        <select class="select" name="maxHeightOfPotentialCandidate" id="maxHeightOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Min Wight:</div>
                    <div>
                        <select class="select" name="minWeightOfPotentialCandidate" id="minWeightOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Max Weight:</div>
                    <div>
                        <select class="select" name="maxWeightOfPotentialCandidate" id="maxWeightOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>City living in:</div>
                    <div>
                        <select class="select" name="maxWeightOfPotentialCandidate" id="maxWeightOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Marital Statua:</div>
                    <div>
                        <select class="select" name="wishedStatusPotentialCandidate" id="wishedStatusPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Religion:</div>
                    <div>
                        <select class="select" name="religionOfPotentialCandidate" id="religionOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Smoking Status</div>
                    <div>
                        <select class="select" name="smokingStatusOfPotentialCandidate" id="smokingStatusOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Eye color:</div>
                    <div>
                        <select class="select" name="eyeColorOfPotentialCandidate" id="eyeColorOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Hair Color:</div>
                    <div>
                        <select class="select" name="hairColorOfPotentialCandidate" id="hairColorOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Body Style</div>
                    <div>
                        <select class="select" name="bodyOfPotentialCandidate" id="bodyOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Appearance:</div>
                    <div>
                        <select class="select" name="apperanceOfPotentialCandidate" id="apperanceOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Clothing:</div>
                    <div>
                        <select class="select" name="clothingOfPotentialCandidate" id="clothingOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Body Art</div>
                    <div>
                        <select class="select" name="clothingOfPotentialCandidate" id="clothingOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Body Style</div>
                    <div>
                        <select class="select" name="bodyOfPotentialCandidate" id="bodyOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Job:</div>
                    <div>
                        <select class="select" name="jobOfPotentialCandidate" id="jobOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Living Style:</div>
                    <div>
                        <select class="select" name="livingStyleOfPotentialCandidate" id="livingStyleOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Vechile</div>
                    <div>
                        <select class="select" name="vehicleOfPotentialCandidate" id="vehicleOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Number of children</div>
                    <div>
                        <select class="select" name="numOfChildrenOfPotentialCandidate" id="numOfChildrenOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                <div class="basic_info_group">
                    <div>Income</div>
                    <div>
                        <select class="select" name="monthlyIncomeOfPotentialCandidate" id="monthlyIncomeOfPotentialCandidate">
                            <option value="1.40">1.40</option>
                            <option value="1.41">1.41</option>
                        </select>
                    </div>
                </div>
                 



              
               



              
               
               
                 
            </div>
        </div>
        <div class="sidebar">
         
        </div>
    </section>
</main>




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