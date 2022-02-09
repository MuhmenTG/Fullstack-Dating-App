<!--<script src="js/utilities/redirect.js" type="module"></script> -->

<?php 
include('inc/top.php');
include('inc/afterLoggedInHeader.php');
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<div class="search-form new-block pdtb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-wrapper">
                    <form id="profileform">
                        <div class="row">
                            <div class="col-lg-12">

                                <h2 class="clr1" style="font-size: 35px;">Edit your profile</h2>

                            </div>
              

                            <div class="col-lg-4 col-md-4">
                                <label>Looking For</label>
                                <div class="form-group">
                                    <select id="userPreferenceGender">
                                        <option value="" selected>Choose Your Preferences</option>
                                        <option value="Men">Men</option>
                                        <option value="Girl">Girl</option>
                                        <option value="other">other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label>Location</label>
                                <div class="form-group">
                                    <select id="userLocation">
                                        <option value="" selected>Choose Your Preferences</option>
                                        <option value="Usa">Usa</option>
                                        <option value="Uk">Uk</option>
                                        <option value="India">India</option>
                                        <option value="china">china</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label>Age :</label>
                                <div class="form-group">
                                    <select id="userAge" >
                                        <option value="" selected>Choose you age</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>            <option value="1">1</option>
                                        <option value="2">2</option>            <option value="1">1</option>
                                        <option value="2">2</option>            <option value="1">1</option>
                                        <option value="2">2</option>            <option value="1">1</option>
                                        <option value="2">2</option>            <option value="1">1</option>
                                        <option value="2">2</option>            <option value="1">1</option>
                                        <option value="2">2</option>            <option value="1">1</option>
                                        <option value="2">2</option>            <option value="1">1</option>
                                        <option value="2">2</option>            <option value="1">1</option>
                                        <option value="2">2</option>            <option value="1">1</option>
                                        <option value="2">2</option>            <option value="1">1</option>
                                        <option value="2">2</option>            <option value="1">1</option>
                                        <option value="2">2</option>            <option value="1">1</option>
                                        <option value="2">2</option>            <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label>height :</label>
                                <div class="form-group">
                                    <select id="userHeight">
                                        <option value="" selected>Choose you age</option>
                                        <option value="1.50">1.50</option>
                                        <option value="1.51">1.51</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label>Weight :</label>
                                <div class="form-group">
                                    <select id="userWeight">
                                        <option value="" selected>Choose you age</option>
                                        <option value="50">50</option>
                                        <option value="51">51</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label>Education :</label>
                                <div class="form-group">
                                    <select id="userMaximumEducation">
                                        <option value="" selected>Graduate</option>
                                        <option value="Post Graduate">Post Graduate</option>
                                        <option value="Studying">Studying</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label>Fatih :</label>
                                <div class="form-group">
                                    <select id="userReligion">
                                        <option value="" selected>Choose Your Fatih</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hinduism">Hinduism</option>
                                        <option value="Christianity">Christianity</option>
                                        <option value="Jews">Jews</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label>Marital Status :</label>
                                <div class="form-group">
                                    <select class="select2" id="userMaritalStatus">
                                        <option value="Single" selected>Single</option>
                                        <option value="married">married</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label>Smoking :</label>
                                <div class="form-group">
                                    <select id="userSmokingStaus">
                                        <option value="" selected>Choose Smoking status</option>
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label>Drinking :</label>
                                <div class="form-group">
                                    <select id="userDrinkingStatus">
                                        <option value="" selected>Do you drink?</option>
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label>Do you have kids :</label>
                                <div class="form-group">
                                    <select id="userParentStatus">
                                        <option value="" selected>Do you have kids?</option>
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                        <option value="I want to">I want to</option>
                                        <option value="Coming..">Coming</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label>Eye color :</label>
                                <div class="form-group">
                                    <select id="userEyeColor">
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

                            <div class="col-lg-4 col-md-4">
                                <label>Hair color :</label>
                                <div class="form-group">
                                    <select id="userHairColor">
                                        <option value="" disabled selected>Choose you hair color</option>
                                        <option value="Blonde hair">Blonde hair</option>
                                        <option value="Brown hair">Brown hair</option>
                                        <option value="Black hair">Black hair</option>
                                        <option value="Red hair">Red hair</option>
                                        <option value="Grey hair">Grey hair</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label>Clothing Style :</label>
                                <div class="form-group">
                                    <select id="userClothingStyle">
                                        <option value="" disabled selected>Choose your style of clothing</option>
                                        <option value="Classic">Classic</option>
                                        <option value="Old School">Old School</option>
                                        <option value="Newest">The Newest</option>
                                        <option value="Goth">Goth</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label>Clothing Style :</label>
                                <div class="form-group">
                                    <select name="livingStyle" id="userLivingStyle">
                                        <option value="" disabled selected>Choose current living style</option>
                                        <option value="Dorm">Dorm</option>
                                        <option value="House">Hourse</option>
                                        <option value="Condominium">Condominium</option>
                                        <option value="Apartment">Apartment</option>
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" id="userid" name="id" value="<?php echo $_SESSION["id"]; ?>">

                            <div class="col-lg-12">
                                <div class="text-center">
                                    <button id="saveDetails" class="c-btn btn1">Save Details</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<span id="go_to_top" class="go-to-top"><i class="fa fa-long-arrow-up"></i></span>
<div class="online-side-nav">
    <span class="nav-btn">
        <a href="#"><i class="flaticon-left-arrow"></i></a>
    </span>
    <div id="chat-sidebar">

    

        <div class="sidebar-user-box" id="105">
            <img src="media/images/ou6.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette active"></i>
            <span class="slider-username">Lokesh Singh </span>
        </div>

        <div class="sidebar-user-box" id="106">
            <img src="media/images/ou7.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette"></i>
            <span class="slider-username">Tony </span>
        </div>

        <div class="sidebar-user-box" id="107">
            <img src="media/images/ou8.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette active"></i>
            <span class="slider-username">Alex Robby </span>
        </div>

        <div class="sidebar-user-box" id="108">
            <img src="media/images/ou9.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette"></i>
            <span class="slider-username">Pragaya Mishra </span>
        </div>

        <div class="sidebar-user-box" id="109">
            <img src="media/images/ou2.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette active"></i>
            <span class="slider-username">Abhishek Mishra </span>
        </div>

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

<script src="js/custom.js" ></script>
<script src="js/navbar.js" type="module"></script>
<script src="js/myProfileEdit.js" type="module"></script>

</body>

</html>