<body id="body">
	<!-- Loader -->
<!--	<div class="loader_wrapper stl2" id="page-preloader">
		<div class="loader-center">		
			<div class="spinner">
				<div class="heart heart1"></div>
				<div class="heart heart2"></div>
				<div class="heart heart3"></div>
			</div>
		</div>
	</div>
--> 

	<div id="wrapper">
		<header class="new-block header">
			<div class="topnav new-block">
				
			</div>
			<div class="main-nav new-block">
				<div class="overlay"></div>
				<div class="container-fluid pad0">
					<div class="row no-gutters">
						<div class="col-lg-12">
							<div class="logo">
								<a href="home.php"><img src="media/images/logo2.png" alt="logo" class="img-responsive"></a>
							</div>
							<a href="#" class="nav-opener"><i class="fa fa-bars"></i></a>
							<div class="nav-block">
								<nav class="nav">
									
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header> <!-- header -->

		<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  		<script>
			Pusher.logToConsole = true;
			var pusher = new Pusher('c2d5c567da85f92e033e', {
			cluster: 'eu'
			});

			var channel = pusher.subscribe('username');
			channel.bind('notifications', function(data) {
			alert(JSON.stringify(data));
			});
 		 </script>

 