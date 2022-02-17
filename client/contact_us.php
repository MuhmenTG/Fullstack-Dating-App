<?php
include('inc/top.php');
include('inc/header.php');

?>
<div class="contact-us new-block pdtb-100">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="block-syl1">
                    <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>
                    <p>Our Address</p>
                    <div class="contact-info">
                        <p>P.O. Box 152 Lakewood, <br>NJ 08701 New York</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="block-syl1">
                    <i class="flaticon-close-envelope"></i>
                    <p>Send Us an Email</p>
                    <div class="contact-info">
                        <p>lamour@support.com <br> lamour@support.com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="block-syl1">
                    <i class="flaticon-old-handphone"></i>
                    <p>Give Us a Ring</p>
                    <div class="contact-info">
                        <p>+01 123 456 789 00 <br>+01 123 456 789 00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="send-note new-block pdtb-100">
    <form id="contactform">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title2">
                        <h2 class="fz35">Send Us a Note</h2>
                        <div class="clearfix"></div>
                        <p class="fz20">Please fill the form below for any inquery</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="msgDiv"></div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <input type="text" id="firstName" class="form-control" placeholder="Enter your first name">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <input type="text" id="lastName" class="form-control" placeholder="Enter your last name">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <input type="text" id="email" class="form-control" placeholder="Enter your email">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <input type="text" id="number" class="form-control" placeholder="Enter your contact number">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <textarea class="form-control" id="message" placeholder="Enter your message.."></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group text-center">
                        <button id="contactBtn" class="btn btn-lg">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>



<div class="contact-map new-block">
     <div id="myMap" style="height: 600px"></div>

<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
 integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
 crossorigin=""></script>


</div>

<span id="go_to_top" class="go-to-top"><i class="fa fa-long-arrow-up"></i></span>

</div>


<?php include('inc/footer.php')?>


<!-- Include jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugins -->
<script src="js/plugins.js"></script>
<!-- Googleapis -->
<script src="js/navbar.js" type="module"></script>
<script src="js/custom.js"></script>
<script src="js/registration.js" type="module"></script>
<script src="js/contactUs.js" type="module"></script>
</body>

</html>