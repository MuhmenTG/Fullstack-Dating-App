<?php 
include('inc/redirect.php');
include('inc/top.php');
include('inc/header.php');
?>

<main class="main">


    <section class="main-section">
        <div class="profileInfo" id="profileInfo" style="padding-bottom: 50%;">
            <div class="basicInfo">
                <h2 class="basicInfo_heading">Suspends your profile for a while</h2>
                <hr />

                <p>Your profile will no longer be visible and you will no longer receive email updates from us However,
                    your information (profile, profile text, photos, contacts, messages, etc.) and your subscription are
                    still available on the site. You can reactivate your profile at any time by logging in to the site
                    with your current email address or by clicking on the link in a sent email.</p>
                <button data-toggle="modal" data-target="#suspendModal" id="submitComment"
                    class="c-btn btn">Suspend</button>
            </div>




        </div>
        <div class="settingsection" id="settingsection">

        </div>
        <div class="sidebar">

        </div>

        <ul class="menu">
            <a href="se">settings</a>
            <li><a href="settings.php" class="about">about</a></li>
            <li><a href="newUserProfilePage.php" class="profile">profile</a></li>
        </ul>
    </section>
</main>

<div id="suspendModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Are you sure you want to leave?</h4>
            </div>
            <div class="modal-body" style="background-color: white;">
                <p>See you soon again</p>
                <button type="button" class="btn btn-default" id="confirmSuspensionnButton"
                    class="c-btn btn">Confirmed</button>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
<script src="js/custom.js"></script>
<script src="js/navbar.js" type="module"></script>
<script src="js/profileSettings.js" type="module"></script>