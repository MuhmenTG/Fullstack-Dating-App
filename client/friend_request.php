<?php 
include('inc/redirect.php');
include('inc/top.php');
include('inc/header.php');
?>

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<link rel="stylesheet" href="css/friend.css">
<div class="container bootstrap snippets bootdey">

    <div class="header">
        <h3 class="text-muted prj-name">
            Pending Friend Requests
        </h3>
    </div>


    <div class="jumbotron list-content">
        <ul class="list-group" id="incoming">
              <li class="list-group-item title">
                Your incoming friend requests
              </li>
        </ul>
    </div>
</div>
</div> 

<div class="container bootstrap snippets bootdey">

    <div class="header">
        <h3 class="text-muted prj-name">
            Your outgoing Friend Request
        </h3>
    </div>


    <div class="jumbotron list-content">
        <ul class="list-group" id="outgoing">
            <li class="list-group-item title">
                Your sent friend requests
            </li>
             
           


        </ul>
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
<script src="js/friends.js" type="module"></script>
<script src="js/navbar.js" type="module"></script>