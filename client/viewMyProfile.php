<?php 
include('inc/checkSession.php');
include('inc/top.php');
include('inc/afterLoggedInHeader.php');
?>
<link rel="stylesheet" href="./css/profile.css">
<div class="search-form new-block pdtb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-wrapper">
                    <form id="profileform">
                        <div class="row">
                            <div class="col-lg-12">

                                <h2 class="clr1" style="font-size: 35px;">View your profile</h2>

                            </div>

                            <div class="col-md-6">
                                <strong>Information</strong><br>

                                <table id="customers">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong>
                                                    Firstname
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                ${data[0][1]}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    Lastname
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                ${data[0][2]}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    Gender
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                ${data[0][5]}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>
                                                    Wished Preference Gender
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                ${data[0][7]}
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>
                                                <strong>
                                                    Location
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                ${data[0][8]}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    Age
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                ${data[0][9]} years
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    Height
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                ${data[0][10]} cm
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>
                                                    Weight
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                ${data[0][11]} kg
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>
                                                    Education
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                ${data[0][12]}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>
                                                    Religion
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                ${data[0][13]}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>
                                                    Marital Status
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                ${data[0][14]}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>
                                                    Smoking Status
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                ${data[0][15]}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>
                                                    Drinking Status
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                ${data[0][16]}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>
                                                    Have kids?
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                ${data[0][17]}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>
                                                    Eye color
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                ${data[0][18]}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>
                                                    Hair color
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>
                                                    Clothing Style
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    Living Style
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<input type="hidden" id="id" name="id" value="<?php echo $_SESSION['id']; ?>">
<span id="go_to_top" class="go-to-top"><i class="fa fa-long-arrow-up"></i></span>
<div class="online-side-nav">
    <span class="nav-btn">
        <a href="#"><i class="flaticon-left-arrow"></i></a>
    </span>
    <div id="chat-sidebar">

        <div class="sidebar-user-box" id="100">
            <img src="media/images/ou1.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette"></i>
            <span class="slider-username">Sumit Kumar Pradhan </span>
        </div>

        <div class="sidebar-user-box" id="101">
            <img src="media/images/ou2.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette active"></i>
            <span class="slider-username">Skptricks </span>
        </div>

        <div class="sidebar-user-box" id="102">
            <img src="media/images/ou3.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette"></i>
            <span class="slider-username">Amit Singh </span>
        </div>

        <div class="sidebar-user-box" id="103">
            <img src="media/images/ou4.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette active"></i>
            <span class="slider-username">Neeraj Tiwari </span>
        </div>

        <div class="sidebar-user-box" id="104">
            <img src="media/images/ou5.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette active"></i>
            <span class="slider-username">Sorav Singh </span>
        </div>

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
<script src="js/custom.js"></script>
<script src="js/navbar.js" type="module"></script>

<script src="js/myProfileEdit.js" type="module"></script>
<script src="js/viewMyUserProfile.js" type="module"></script>
</body>

</html>