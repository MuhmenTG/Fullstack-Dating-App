
<?php
include('inc/top.php');
include('inc/afterLoggedInHeader.php')
?>
		<section class="page-info new-block">
			<div class="fixed-bg" style="background: url('media/images/page-info-bg.jpg');"></div>
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-wrapper">
							<h2 class="clr1">Search Girls For Dating</h2>
							<div class="clearfix"></div>
							<ul class="list-unstyled">
								<li><a href="#">Home</a></li>
								<li><a href="#"> - </a></li>
								<li><a href="#">Girls</a></li>
							</ul>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search by Name">
							<a href="#" class="sarch-member-btn"><i class="flaticon-search"></i></a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<div class="search-form new-block pdtb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-wrapper">
							<form id="searchForm"> 
								<div class="row">
									<div class="col-lg-4 col-md-4">
										<label>I am a :</label>
		    							<div class="form-group">
		    								<select id="gender">
		    									<option value="" >Choose gender</option>
		    									<option value="Male" selected>Male</option>
		    									<option value="Female">Female</option>
												<option value="Other" >Other</option>
		    								</select>
		    							</div>
									</div>
									<div class="col-lg-4 col-md-4">
										<label>Looking For</label>
		    							<div class="form-group">
		    								<select id="lookingfor">
		    									<option value="" selected>Choose Your Preferences</option>
		    									<option value="Male">Male</option>
		    									<option value="Female">Female</option>
												<option value="Other">Other</option>
		    								</select>
		    							</div>
									</div>
									<div class="col-lg-4 col-md-4">
										<label>Location</label>
		    							<div class="form-group">
		    								<select id="location">
		    									<option value="" selected>Choose Your Preferences</option>
		    									<option value="Copenhagen">Copenhagen</option>
		    									<option value="Aalborg">Aalborg</option>
		    									<option value="India">India</option>
		    									<option value="china">china</option>
		    								</select>
		    							</div>
									</div>

									<div class="col-lg-4 col-md-4">
										<label>Age : <span id="result_1"> 18 - 25</span></label>
		    							<div class="form-group">
		    								<input id="range_1" />
			                            </div>
									</div>
									<div class="col-lg-4 col-md-4">
	    								<label>Height : <span id="result_2">150 - 200cm</span></label>
		    							<div class="form-group">
		    								<input id="range_2" />
			                            </div>
		    						</div>
									<div class="col-lg-4 col-md-4">
										<label>Weight : <span id="result_3"> 40kg - 80kg</span></label>
		    							<div class="form-group">
		    								<input id="range_3" />
			                            </div>
									</div>

									<div class="col-lg-4 col-md-4">
										<label>Education :</label>
		    							<div class="form-group">
		    								<select id="education">
		    									<option value="graduate" selected>Graduate</option>
		    									<option value="Post-Graduate">Post Graduate</option>
		    									<option value="Studying">Studying</option>
		    								</select>
		    							</div>
									</div>
									<div class="col-lg-4 col-md-4">
										<label>Social Status :</label>
		    							<div class="form-group">
		    								<select id="socialstatus">
		    									<option value="" selected>Choose Your Preferences</option>
		    									<option value="Facebook">Facebook</option>
		    									<option value="twitter">twitter</option>
		    									<option value="whatsapp">whatsapp</option>
		    								</select>
		    							</div>
									</div>
									<div class="col-lg-4 col-md-4">
										<label>Working in :</label>
		    							<div class="form-group">
		    								<select id="work">
		    									<option value="" selected>All</option>
		    									<option value="It sector">It sector</option>
		    									<option value="business">business</option>
		    									<option value="business">Multimedia</option>
		    								</select>
		    							</div>
									</div>

									<div class="col-lg-4 col-md-4">
										<label>Marital Status :</label>
		    							<div class="form-group">
		    								<select id="maritalStatus">
		    									<option value="Single" selected>Single</option>
		    									<option value="married">married</option>
												<option value="Divorced">Divorced</option>
		    								</select>
		    							</div>
									</div>
									<div class="col-lg-4 col-md-4">
										<label>Smoking :</label>
		    							<div class="form-group">
		    								<select id="smokingStatus">
		    									<option value="" selected>Choose Smoking status</option>
		    									<option value="No">No</option>
												<option value="Yes">Yes</option>
		    								</select>
		    							</div>
									</div>
									<div class="col-lg-4 col-md-4">
										<label>Drinking :</label>
		    							<div class="form-group">
		    								<select id="drinkingStatus">
		    									<option value="" >Do you drink?</option>
		    									<option value="No" selected>No</option>
												<option value="Yes">Yes</option>
		    								</select>
		    							</div>
									</div>
									<div class="col-lg-12">
		    							<div class="text-center">
		    								<button  class="c-btn btn1">Search</button>
		    							</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="adv new-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="img-holder">
							<img src="media/images/222222.jpg" alt="" class="img-responsive">
						</div>
					</div>
				</div>
			</div>
		</div> -->




		<section class="search-result-area new-block pdtb-100">
			<div class="container">
				<div class="row" id="peopleContainer">
				
				</div>
			</div>
		</section> 

		<!-- <section class="lamour-suggest new-block pdtb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="title2">
							<h2 class="fz35">Search Result : 247</h2>
							<div class="clearfix"></div>
							<p class="fz20">Aliquam a neque tortor. Donec iaculis auctor turpis. Eporttitor<br> mattis ullamcorper urna. Cras quis elementum</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="block-stl2">
							<div class="img-holder">
								<img src="media/images/img1.jpg" alt="" class="img-responsive">
							</div>
							<div class="txt-block">
								<h3 class="fz22">Tenma Shyna</h3>
								<p>22 / F / Philippines	</p>
							</div>
						</div>
					</div>
					
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="block-stl2">
							<div class="img-holder">
								<img src="media/images/img2.jpg" alt="" class="img-responsive">
							</div>
							<div class="txt-block">
								<h3 class="fz22">Tenma Shyna</h3>
								<p>22 / M / Philippines	</p>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="block-stl2">
							<div class="img-holder">
								<img src="media/images/img3.jpg" alt="" class="img-responsive">
							</div>
							<div class="txt-block">
								<h3 class="fz22">Tenma Shyna</h3>
								<p>22 / F / Philippines	</p>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="block-stl2">
							<div class="img-holder">
								<img src="media/images/img4.jpg" alt="" class="img-responsive">
							</div>
							<div class="txt-block">
								<h3 class="fz22">Tenma Shyna</h3>
								<p>22 / F / Philippines	</p>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="block-stl2">
							<div class="img-holder">
								<img src="media/images/img5.jpg" alt="" class="img-responsive">
							</div>
							<div class="txt-block">
								<h3 class="fz22">Tenma Shyna</h3>
								<p>22 / F / Philippines	</p>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="block-stl2">
							<div class="img-holder">
								<img src="media/images/img6.jpg" alt="" class="img-responsive">
							</div>
							<div class="txt-block">
								<h3 class="fz22">Tenma Shyna</h3>
								<p>22 / F / Philippines	</p>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="block-stl2">
							<div class="img-holder">
								<img src="media/images/img7.jpg" alt="" class="img-responsive">
							</div>
							<div class="txt-block">
								<h3 class="fz22">Tenma Shyna</h3>
								<p>22 / M / Philippines	</p>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="block-stl2">
							<div class="img-holder">
								<img src="media/images/img8.jpg" alt="" class="img-responsive">
							</div>
							<div class="txt-block">
								<h3 class="fz22">Tenma Shyna</h3>
								<p>22 / F / Philippines	</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->

 
		
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


	<?php include('modals/modal.php')?>
	<?php include('inc/footer.php')?>
	<!-- Include jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Plugins -->
	<script src="js/plugins.js"></script>
	<!-- Googleapis -->
	
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Custom -->

	<script src="js/navbar.js" type="module"></script>
    <script src="js/search_partner.js" type="module"></script>
	<script src="js/custom.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBP1lPhUhDU6MINpruPDinAzXffRlpzzFo"></script>
	

</body>
</html>