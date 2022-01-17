
<?php
include('inc/top.php');
include('inc/header.php');

?>

		<section class="page-info new-block">
			<div class="fixed-bg" style="background: url('media/images/page-info-bg.jpg');"></div>
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-wrapper">
							<h2 class="clr1">Blog</h2>
							<div class="clearfix"></div>
							<ul class="list-unstyled">
								<li><a href="#">Home</a></li>
								<li><a href="#"> - </a></li>
								<li><a href="#">Blog</a></li>
							</ul>
						</div>
						<div class="form-group">
                            <input type="text" id="searchVale" class="form-control" placeholder="Search by Name"
                                oninput="showBlogPost(this.value)">
                            <a href="#" class="sarch-member-btn"><i class="flaticon-search"></i></a>
                        </div>
					</div>
				</div>
			</div>
		</section>

		<section class="blog-page new-block pdtb-100">
            <div class="container">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12" id="insideContainerBlog">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <a href="#" class="c-btn btn1">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

 

		<span id="go_to_top" class="go-to-top"><i class="fa fa-long-arrow-up"></i></span>
		<div class="online-side-nav">
			<span class="nav-btn">
				<a href="#"><i class="flaticon-left-arrow"></i></a>
			</span>
			<div id="chat-sidebar">

				<div class="sidebar-user-box" id="100" >
					<img src="media/images/ou1.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette"></i>
					<span class="slider-username">Sumit Kumar Pradhan </span>
				</div> 

				<div class="sidebar-user-box" id="101" >
					<img src="media/images/ou2.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette active"></i>
					<span class="slider-username">Skptricks </span>
				</div> 

				<div class="sidebar-user-box" id="102" >
					<img src="media/images/ou3.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette"></i>
					<span class="slider-username">Amit Singh </span>
				</div> 

				<div class="sidebar-user-box" id="103" >
					<img src="media/images/ou4.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette active"></i>
					<span class="slider-username">Neeraj Tiwari </span>
				</div> 

				<div class="sidebar-user-box" id="104"  >
					<img src="media/images/ou5.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette active"></i>
					<span class="slider-username">Sorav Singh </span>
				</div> 

				<div class="sidebar-user-box" id="105" >
					<img src="media/images/ou6.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette active"></i>
					<span class="slider-username">Lokesh Singh </span>
				</div> 

				<div class="sidebar-user-box" id="106" >
					<img src="media/images/ou7.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette"></i>
					<span class="slider-username">Tony </span>
				</div> 

				<div class="sidebar-user-box" id="107" >
					<img src="media/images/ou8.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette active"></i>
					<span class="slider-username">Alex Robby </span>
				</div> 

				<div class="sidebar-user-box" id="108" >
					<img src="media/images/ou9.jpg" alt=" " />
					<i class="flaticon-circular-shape-silhouette"></i>
					<span class="slider-username">Pragaya Mishra </span>
				</div> 

				<div class="sidebar-user-box" id="109" >
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
	<script src="js/blogs.js"></script>
	<script>
	showBlogPost();	
	</script>

</body>
</html>