<?php
include('inc/top.php');
include('inc/header.php');

?>
<div class="topper">
  <h1>User Profile</h1>
</div>
<div class="container">
    <div class="photo">
      <img src="http://static4.businessinsider.com/image/52c9702c6bb3f751704f26dd/according-to-science-these-are-the-best-photos-to-use-in-your-dating-profile.jpg" />
      <p>Jane Doe</p>
    </div>
    <div class="personal">
      <div>
       <h3>Current Saved Address</h3>
        <p>42 Wallaby Lane</p>
        <input type="submit" value="Edit" />
      </div>
      <div>
        <h3>Current Subscription Plan</h3>
        <p><a href="#">Get Fit Family Pack</a></p>
        <input type="submit" value="Edit" />
      </div>
    </div>
    <div class="points">
      <h4>875</h4>
      <p>Power Points</p>
    </div>
    <div class="deal">
      <h3>Latest Deal</h3>
      <img src="http://lorempixel.com/600/215" />
    </div>
    <div class="recent">
      <div>
        <h4>Recent Activity</h4>
          <ul>
            <li>Action 1 <span> 10pts</span></li>
            <li>Action 2 <span> 5pts</span></li>
            <li>Action 3 <span> 15pts</span></li>
            <li>Action 4 <span> 10pts</span></li>
            <li>Action 5 <span> 30pts</span></li>
            <li>Action 6 <span> 5pts</span></li>
          </ul>  
      </div>
    </div>
    <div class="bought">
      <div>
        <h4>Recent Purchases</h4>
        <ul>
          <li>Item 1 <span> 100pts</span></li>
          <li>Item 2 <span> 50pts</span></li>
          <li>Item 3 <span> 120pts</span></li>
          <li>Item 4 <span> 100pts</span></li>
          <li>Item 5 <span> 50pts</span></li>
          </ul> 
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