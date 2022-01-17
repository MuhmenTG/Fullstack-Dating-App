<?php
include('inc/top.php');
include('inc/header.php');

?>
<link rel="stylesheet" href="css/viewprofile.css">
<button class="btn btn-danger btn-sm" onclick="window.history.back()">Back to results </button>
<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="https://gravatar.com/avatar/31b64e4876d603ce78e04102c67d6144?s=80&d=https://codepen.io/assets/avatars/user-avatar-80x80-bdcd44a3bfb9a5fd01eb8b86f9e033fa1a9897c3a15b33adfc2649a002dab1b6.png"
                        class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div id="intro" class="profile-usertitle">

                    <div class="profile-usertitle-job">
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm">Love/Like</button>
                    <button type="button" class="btn btn-danger btn-sm">Message</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->


                <div class="portlet light bordered">
                    <!-- STAT -->

                    <!-- END STAT -->
                    <div id="about">


                    </div>
                </div>



            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                <div class="container bootstrap snippets bootdey">
                    <div class="panel-body inf-content">
                        <div class="row">

                            <div class="col-md-6">
                                <strong>Information</strong><br>
                                <div class="table-responsive">
                                    <table id="userTableDetails" class="table table-user-information">
                                      
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
<script src="js/viewUserProfile.js" type="module"></script>
</body>

</html>