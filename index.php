<!---
Author: Aashish Parmar (parmaraashish3@gmail.com)

Index page for portal
--->

<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<meta content="IE=edge" http-equiv="X-UA-Compatible" />
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="css/jquery.funnyText.css" rel="stylesheet" type="text/css" />
		<link href="css/animate.css" rel="stylesheet" type="text/css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
		<script src="function.js" type="text/javascript"></script>	
		<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="js/jssor.slider.mini.js"></script>
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script>
		$(document).ready(function(){
			var header = $('.head');

			var backgrounds = new Array(
				'url(images/02.jpg)'
				, 'url(images/04.jpg)'
				, 'url(images/05.jpg)'
				, 'url(images/09.jpg)'
			);

			var current = 0;

			function nextBackground() {
				current++;
				current = current % backgrounds.length;
				header.css('background-image', backgrounds[current]);
			}
			setInterval(nextBackground, 5000);

			header.css('background-image', backgrounds[0]);
		});
		</script>
		<title>Smart Library</title>
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<!-- Nav Section Start-->
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">Smart Library</a>
				</div>
				<!-- navbar-header ends-->
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#bottom">Contact Us</a></li>
						<li><a href="institute.php">Start Shopping</a></li>
					</ul>
				</div>
			</div>
		</nav>
		
		<header class="head">
			<!-- Head Section Start-->
			<div class="container">
				<div class="row">	
					<div class="col-md-6x col-xs-6 logo wow fadeIn">
					<img alt="Logo" class="img-responsive" src="images/Logo.png"  style="float:right;width:200px;height:180px; padding-top:50px">
					</div>
				</div>
				<!-- Row End-->
				<div class="row">
					<div class="col-md-6 col-sm-6 main-content wow fadeInLeft" style="border: medium solid black; background-color: rgba(255, 0, 0, 0.4);">
						<h1 class="funnytext" style="font-size:35px; font-color:black">Description</h1>					
						<p>
							Smart library provides you book for whole year ie, odd and even semester at a membership fees of <b>Rs 1650/-</b> only.<br>
						You can take one book of each subject that you have in semester only. <br>Books for next semester will be given when you return your previous 
						semester books back.
						</p>
					</div>
					<div id="usercred" class="col-md-6 col-sm-6 wow fadeInLeft">
					<div>
						<?php if($_SESSION["email"] == "") { ?>
						<button class="btn btn-default" id="sin">Sign In</button>
						<button class="btn btn-default" id="sup">Sign Up</button>
					</div>		
					<div id="signin">
						<?php if($_SESSION["state"] == "login") {echo 'Invalid Information';} ?>
						<form method="POST" action="login.php">
							<input type="email" name="email" placeholder="E-Mail" required>
							<br>
							<input type="password" name="pwd" placeholder="Password" required>
							<br>
							<input type="submit" value="Login" class="btn btn-default">
						</form>
					</div>
					<div id="signup">
						<?php if($_SESSION["state"] == "register") {echo 'Invalid or Missing Information';} ?>
						<form method="POST" action="register.php">
							<input type="text" name="name" placeholder="Name" pattern="[A-Za-z]{1-}" required>
							<br>
							<div id="check">
								<div id="formstate"></div>
								<input type="text" name="phone" placeholder="Phone Number" pattern="[0-9]{10-15}" required>
								<br>
								<input type="email" name="email" placeholder="E-Mail" required>
								<br>
							</div>
							<?php unset($_SESSION["state"]); session_destroy(); ?>
							<input type="text" name="univ" placeholder="University/College" required>
							<br>
							<input type="text" name="depart" placeholder="Department" required>
							<br>
							<textarea rows="4" cols="30" maxlength="300" wrap="hard" name="addres" placeholder="Address" required></textarea>
							<br>
							<input type="password" id="pwd" name="pwd" placeholder="Password" required>
							<br>
							<input type="password" id="pwd2" name="pwd2" placeholder="Confirm Password" required>
							<br>
							<input type="submit" id="submt" value="Register" class="btn btn-default">
							<br>
						</form>
					</div>
					<?php } else {
						echo 'Welcome ' . $_SESSION["name"] . '<br><a class="btn btn-inverse" href="logout.php">Logout</a>';
					} ?>
				</div>		
				<!-- Row End -->
			</div>
			<!-- Container End -->
			
		</header>
		<!-- Head Section End -->
			
		<section class="features">
		<!-- Features Container Start -->
			<div class="container">
				<div class="row">
					<div class="col-md-12 features-title wow fadeIn"></div>
					<div class="col-md-3 col-sm-6 wow fadeInUp" style="max-width: 250px;">
						<img alt="phone mockup" class="phone-mockup" src="images/login.png" width="100%" height ="450px" /> 
					</div>
					<div class="col-md-3 col-sm-6 wow fadeInUp" style="max-width: 250px;">
						<img alt="phone mockup" class="phone-mockup" src="images/select.png" width="100%" height ="450px" /> 
					</div>
					<div class="col-md-3 col-sm-6 wow fadeInUp" style="max-width: 250px;">
						<img alt="phone mockup" class="phone-mockup" src="images/checkout.png" width="100%" height ="450px" /> 
					</div>
					<div class="col-md-3 col-sm-6 wow fadeInUp" style="max-width: 250px;">
						<img alt="phone mockup" class="phone-mockup" src="images/pay.png" width="100%" height ="450px" /> 
					</div>
				</div>
				<!-- Row End -->
			</div>
			<!-- Container End -->
		</section>
		<!-- Features Container End -->

		<a name="bottom">
		<footer class="footer-info"><!-- Footer Section Start -->
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4 wow fadeInLeft"><a href="#" target="_blank"><img alt="Footer-Logo" src="images/facebook-icon.jpg" /></a></div>

					<div class="col-md-4 col-sm-4 footer-nav wow fadeInUp">
							
							<address>
								<strong><p style="text-align:center";>Smart Library</strong><br>
							</address>
							
						
					</div>

					<div class="col-md-4 col-sm-4 wow fadeInRight">
						<p>All Rights Reserved</p>
					</div>
				</div>
				<!-- Row End -->
			</div>
			<!-- Container End -->
		</footer>
		<!-- Footer Section End -->
		
		<!-- scripts starts here-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.funnyText.js"></script>
		<script src="js/wow.min.js"></script>
		<script src="js/queryloader2.min.js" type="text/javascript"></script>
		<!-- scripts end here-->
		<!-- Preloader Script-->
		<script type="text/javascript">
				window.addEventListener('DOMContentLoaded', function() {
				new QueryLoader2(document.querySelector("body"), {
				barColor: "#efefef",
				backgroundColor: "#111",
				percentage: true,
				barHeight: 1,
				minimumTime: 200,
				fadeOutTime: 1000
				});
			});
		</script>
		<!-- Animations Script-->
		<script>
			new WOW().init();
		</script>
		<!-- Funny Text Jquery Script-->
		<script type="text/javascript">
			$(document).ready(function() {
			$('.funnytext').funnyText({
				speed: 200,
				borderColor: 'none',
				activeColor: 'white',
				color: 'white',
				fontSize: '44px',
				direction: 'both'
				});
			});

		</script>
			
	</body>
	
</html>
