<?php 
include('inc/checkSession.php');
include('inc/top.php');
include('inc/afterLoggedInHeader.php');
?>
 
<div class="search-form new-block pdtb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-wrapper" style="height: 1000px;">
                    <form id="searchForm">
                        <div class="row">
                            <div class="col-lg-12">

                                <h2 class="clr1" style="font-size: 35px;">Your Profile Settings</h2>

                            </div>

                        </div>
                        <hr>

                        <div class="form-check">
                            <label>
                                <input type="checkbox" name="check"> <span class="label-text">Do not show my profile to
                                    users - make my account invisiable</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <label>
                                <input type="checkbox" name="check"> <span class="label-text">Stop receiving messages
                                    from other users</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <label>
                                <input type="checkbox" name="check"> <span class="label-text">Block</span>
                            </label>
                        </div>
                        <button id="savedChangesBtn" class="c-btn btn1">Save changes</button>

                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <label>Telephone:</label>
                                <div class="form-group">
                                    <input type="number" id="telf" name="telf" class="form-control">
                                </div>
                                <button id="saveEmailChangesBtn" class="c-btn btn1">Save changes</button>

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
<script src="js/navbar.js" type="module"></script>

<script src="js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugins -->
<script src="js/plugins.js"></script>
<!-- Googleapis -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBP1lPhUhDU6MINpruPDinAzXffRlpzzFo"></script>
<!-- Custom -->
<script src="js/custom.js"></script>

</body>

</html>