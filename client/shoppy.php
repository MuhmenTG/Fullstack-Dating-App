<?php
	include('inc/top.php');
	include('inc/header.php');

?>
<button type="button" id="modal" class="btn btn-info btn-md">Basket</button>

<section>
   <H1>check out our shop</H1>
</section>
<link rel="stylesheet" href="css/shop.css">

<div class="shell">
    <div class="container">
        <div class="row" id="productsRow">
           
        </div>
    </div>
</div>









































<div id="myBasket" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">My basket</h4>
      </div>
      
      <div class="modal-body">
        <table class="show-cart table">
          

        <script src="js/shop.js" type="module"></script>

        </table>
        <div>Total price: $<span class="total-cart"></span></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>









































<!-- Bootstrap -->
<script src="js/shop.js" type="module"></script>
<script src="js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugins -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBP1lPhUhDU6MINpruPDinAzXffRlpzzFo"></script>
<!-- Custom -->


</body>

</html>