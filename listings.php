<?php 
session_start();
include('config.php');
error_reporting(0);
if($_SESSION['login']!=''){
$_SESSION['login']='';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Listings</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="myHOME - real estate template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/animate.css">
<link rel="stylesheet" type="text/css" href="styles/listings.css">
<link rel="stylesheet" type="text/css" href="styles/listings_responsive.css">
</head>
<body>

<div class="super_container">
	<div class="super_overlay"></div>
	
	<!-- Header -->

	<header class="header">
		
		<!-- Header Bar -->
		<div class="header_bar d-flex flex-row align-items-center justify-content-start">
			<div class="header_list">
				<ul class="d-flex flex-row align-items-center justify-content-start">
					<!-- Phone -->
					<li class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="images/phone-call.svg" alt=""></div>
						<span>+546 990221 123</span>
					</li>
					<!-- Address -->
					<li class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="images/placeholder.svg" alt=""></div>
						<span>Moti Nagar, no 33, BALAGHAT</span>
					</li>
					<!-- Email -->
					<li class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="images/envelope.svg" alt=""></div>
						<span>RoomRentService.com</span>
					</li>
				</ul>
			</div>
			<div class="ml-auto d-flex flex-row align-items-center justify-content-start">
				<div class="social">
					<ul class="d-flex flex-row align-items-center justify-content-start">
						<li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="log_reg d-flex flex-row align-items-center justify-content-start">
					<ul class="d-flex flex-row align-items-start justify-content-start">
						<li><a href="login.php">Login</a></li>
						<li><a href="registration.php">Register</a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Header Content -->
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo"><a href="#">RoomRent<span>Service</span></a></div>
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li><a href="index.php">Home</a></li>
					<li><a href="about.html">About us</a></li>
					<li class="active"><a href="listings.php">Listings</a></li>
					<li><a href="blog.html">News</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</nav>
			<div class="submit ml-auto"><a href="#">submit listing</a></div>
			<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
		</div>

	</header>

	<!-- Menu -->

	<div class="menu text-right">
		<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="menu_log_reg">
			<div class="log_reg d-flex flex-row align-items-center justify-content-end">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li><a href="login.php">Login</a></li>
						<li><a href="registration.php">Register</a></li>
				</ul>
			</div>
			<nav class="menu_nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="about.html">About us</a></li>
					<li><a href="listings.php">Listings</a></li>
					<li><a href="blog.html">News</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</nav>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/listings.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content text-center">
						<div class="home_title">Listings</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Search -->

	<div class="search">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="search_container">
						<div class="search_form_container">
							<form action="#" class="search_form" id="search_form">
								<div class="d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
									<div class="search_inputs d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
										<input type="text" class="search_input" placeholder="Property type" required="required">
										<input type="text" class="search_input" placeholder="No rooms" required="required">
										<input type="text" class="search_input" placeholder="Location" required="required">
									</div>
									<button class="search_button">submit listing</button>
								</div>
							</form>
						</div>
						<div class="extra_search_buttons d-flex flex-row align-items-start justify-content-start">
							<div class="extra_search_button search_button_1"><a href="#">Detailed Search</a></div>
							<div class="extra_search_button search_button_2"><a href="#">Show Map</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Listings -->

	<div class="listings">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<!-- Sorting -->
					<div class="sorting d-flex flex-md-row flex-column align-items-start justify-content-start">
						
						<!-- Tags -->
						<div class="listing_tags">
							<ul class="d-flex flex-row align-items-start justify-content-start flex-wrap">
								<li><a href="#">2 beds<span>x</span></a></li>
								<li><a href="#">2 baths<span>x</span></a></li>
								<li><a href="#">garage<span>x</span></a></li>
								<li><a href="#">swimming pool<span>x</span></a></li>
								<li><a href="#">patio<span>x</span></a></li>
								<li><a href="#">heated floors<span>x</span></a></li>
								<li><a href="#">garden<span>x</span></a></li>
							</ul>
						</div>

						<!-- Sort -->
						<div class="sorting_container">
							<div class="sort">
								<span>Sort By</span>
								<ul>
									<li class="sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>Default</li>
									<li class="sorting_button" data-isotope-option='{ "sortBy": "price" }'>Price</li>
									<li class="sorting_button" data-isotope-option='{ "sortBy": "area" }'>Area</li>
								</ul>
							</div>
						</div>

					</div>

					<!-- Listings Container -->
					<div class="listings_container">
<?php 
//require_once("../config.php");
$query =mysql_query("select * from room order by apply");
         $records = mysql_num_rows($query);
		 $i=1;
while($row = mysql_fetch_array($query))
{
             ?>				
				<div class="listing_box house sale">
							<div class="listing">
								<div class="listing_image">
									<div class="listing_image_container">
										<img src="owner/record/<?php echo $row['photo'];?>" width="350" height="273" alt="">
									</div>
									<div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
<?php 
if($row['purpose']=='Rent')
{
?>
								<div class="tag tag_house"><a href="">Room</a></div>
								<?php
}else{
?>
								<div class="tag tag_sale"><a href="">for sale</a></div>
<?php
}
?>
									</div>
									<div class="tag_price listing_price">₹ <?php echo $row['rent'];?></div>
								</div>
								<div class="listing_content">
									<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
										<img src="images/icon_1.png" alt="">
										<a href=""><?php echo $row['location'];?></a>
									</div>
									<div class="listing_info">
										<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
											<li class="property_area d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_2.png" alt="">
												<span><?php echo $row['sif'];?></span>
											</li>
											
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_4.png" alt="">
												<span><?php echo $row['floor'];?></span>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_5.png" alt="">
												<span><?php echo $row['nom'];?></span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
<?php
$i++;
} 
?> 									
						


					</div>
					<div class="load_more">
						<div class="button ml-auto mr-auto"><a href="#">load more</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="footer_content">
			<div class="container">
				<div class="row">
					
					<!-- Footer Column -->
					<div class="col-xl-3 col-lg-6 footer_col">
						<div class="footer_about">
							<div class="footer_logo"><a href="#">RoomRent<span>Service</span></a></div>
							<div class="footer_text">
								<p>RRS is a type of a service with the help of it we could carry the renter easily  , By  which the important time of renter and ownwer will be saved</p>
							</div>

						</div>
					</div>

					<!-- Footer Column -->
					<div class="col-xl-3 col-lg-6 footer_col">
						<div class="footer_column">
							<div class="footer_title">Information</div>
							<div class="footer_info">
								<ul>
									<!-- Phone -->
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div><img src="images/phone-call.svg" alt=""></div>
										<a href="tel://9755665903"><span>+91 9755665903</span></a>
									</li>
									<!-- Address -->
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div><img src="images/placeholder.svg" alt=""></div>
										<span>Moti Nagar, no 33, BALAGHAT</span>
									</li>
									<!-- Email -->
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div><img src="images/envelope.svg" alt=""></div>
										<span>RoomRentService@contact.com</span>
									</li>
								</ul>
							</div>
							
						</div>
					</div>

					<!-- Footer Column -->
					<div class="col-xl-3 col-lg-6 footer_col">
						<div class="footer_links">
							<div class="footer_title">Room Types</div>
							<ul>
								<li><a href="#">Room for Family</a></li>
								<li><a href="#">Single room</a></li>
								<li><a href="#">Room for Friends</a></li>
								<li><a href="#">Homes</a></li>
								<li><a href="#">Office</a></li>
								<li><a href="#">Residential</a></li>
								<li><a href="#">Appartments</a></li>
							</ul>
						</div>
					</div>
						<div class="col-xl-3 col-lg-6 footer_col">
							<div class="footer_title">Connect With Us!</div>
							
								<div class="social">
								<ul class="d-flex flex-row align-items-center justify-content-start">
									<li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								</ul>
							</div>
							<div class="footer_submit"><a href="#">submit listing</a></div>
					</div>						
				</div>

			</div>
		</div>

		<div class="footer_bar">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="footer_bar_content d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
							<div class="copyright order-md-1 order-2"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This site is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="index.html" target="_blank">Room Rent Service</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
							<nav class="footer_nav order-md-2 order-1 ml-md-auto">
								<ul class="d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
									<li><a href="index.php">Home</a></li>
									<li><a href="about.html">About us</a></li>
									<li><a href="listings.php">Listings</a></li>
									<li><a href="blog.html">News</a></li>
									<li><a href="contact.html">Contact</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.3.4/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="js/listings.js"></script>
</body>
</html>