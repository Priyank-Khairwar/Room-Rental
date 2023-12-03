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
<title>Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="myHOME - real estate template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
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
						<span>RoomRantService@contact.com</span>
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
					<li><a href="listings.php">Listings</a></li>
					<li><a href="blog.html">News</a></li>
					<li class="active"><a href="contact.html">Contact</a></li>
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


	<!-- Contact -->

	<div class="contact">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_title"><h1>Owner Registration</h1></div>
					</div>
				</div>
			</div>
			
			<div class="row contact_form_row">
				<div class="col">
					<div class="contact_form_container">
						
<form name="signup" method="post" onSubmit="return valid();">
<div class="form-group">
<div class="row">
<div class="col-md-6">
<label>Enter Full Name</label>
<input class="form-control" type="text" name="name" autocomplete="off" required />
</div>
 
<div class="col-md-3">                                      
<label>Enter Gender</label>
<select class="form-control" type="text" name="gender" autocomplete="off" required />
<option value="">Select Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
<div class="col-md-3">                                      
<label>Enter DOB</label>
<input class="form-control" type="date" name="dob" autocomplete="off" required />
</div>
</div>
</div>

<div class="form-group">
<div class="row">
<div class="col-md-4">
<label>Mobile Number :</label>
<input class="form-control" type="text" name="mob" maxlength="10" autocomplete="off" required />
</div>
 
<div class="col-md-8">                                      
<label>Enter Email</label>
<input class="form-control" type="email" name="email" id="emailid" onBlur="checkAvailability()"  autocomplete="off" required  />
   <span id="user-availability-status" style="font-size:12px;"></span> 
</div>
</div>
</div>

<div class="form-group">
<div class="row">
<div class="col-md-6">
<label>Enter Password</label>
<input class="form-control" type="password" name="password" autocomplete="off" required  />
</div>
 
<div class="col-md-6">                                      
<label>Confirm Password </label>
<input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
</div>
</div>
</div>
 <div class="form-group">
<label>Enter Address</label>
<textarea class="form-control" name="addr" required autocomplete="off" /></textarea>
</div>
 <button type="submit" name="submit" class="btn btn-info">Register </button>   
</form> 
<?php 
if(isset($_POST['submit']))
{
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$pass=$_REQUEST['password'];
$gender=$_REQUEST['gender'];
$dob=$_REQUEST['dob'];
$mob=$_REQUEST['mob'];
$addr=$_REQUEST['addr'];
$query =mysql_query("insert into user (username,pass,name,mob,gender,addr,dob,status) values ('$email','$pass','$name','$mob','$gender','$addr','$dob','active')");
 echo '<script type="text/javascript">alert("Registration Completed Successfully");window.location=\'login.php\';</script>';
}
?>
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
									<li><a href="index.html">Home</a></li>
									<li><a href="about.html">About us</a></li>
									<li><a href="listings.html">Listings</a></li>
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
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="js/contact.js"></script>
</body>
</html>