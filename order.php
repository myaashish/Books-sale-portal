<!---
Author: Aashish Parmar (parmaraashish3@gmail.com)

This page creates the cart page for all the orders placed by the user.
--->

<?php
	session_start();
	$db = mysql_connect("localhost","$user","$pass");
	mysql_select_db("$db_name",$db);
?>
<html>
	<head>
		<script src=functions.js type="text/javascript"></script>
		<script src=function.js type="text/javascript"></script>
		<title></title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6x col-xs-6 logo wow fadeIn" style="width: unset;">
					<img alt="Logo" class="img-responsive" src="images/Logo.png"  style="float:right;width:120px;height:180px; padding-top:50px">
				</div>
			</div>
		</div>
		<?php if($_SESSION["email"] != "") { 
			echo 'Welcome ' . $_SESSION["name"] . '<br><a href="logout.php">Logout</a>';
		}?>
		<br>
		<?php
			$colg = $_SESSION["college"];
			echo '<h1>' . $_SESSION["name"] . '</h1><h2>' .  $_SESSION["branch"] . ' / ' . $_SESSION["sem"] . '</h2>';
			$_SESSION["cost"] = 0;
			echo '<table class="table table-striped"><thead><tr><th>Book</th><th>Subject</th><th>Book Name</th></tr></thead><tbody>';
			foreach($_SESSION as $key => $value) 
			{
				$subject = $key;
				$bname = $value;
				$qry = 'select * from ' . mysql_real_escape_string($colg) . ' where subject="' . $subject . '" and name="' . $bname . '";';
				$query = mysql_query($qry , $db);
				while($entry = mysql_fetch_array($query)) {
					$_SESSION["cost"] = $_SESSION["cost"] + $entry["cost"];
					echo '<tr><td><img width="100px" height="100px" src="' . $entry["location"] . '"></td><td>' . $subject . '</td><td>' . $bname . '</td></tr>';
				}
			}
			$qry = 'select cost from ' . mysql_real_escape_string($colg) . 'cost' . ' where branch="' . $_SESSION["branch"] . '" and sem="' . $_SESSION["sem"] . '";';
			$query = mysql_query($qry , $db);
			while($entry = mysql_fetch_array($query)) {
				$_SESSION["cost"] = $entry["cost"];
			}
			echo '</tbody></table><div id="cost"><strong>' . $_SESSION["cost"]. '</strong></div>';				
			if($_SESSION["email"] != "") {
				echo '<p class="buttons center">If you have any referral <input type="text" id="refcode"><button  class="btn btn-default" id="refbtn" onclick = checkref()>Submit Referal</button><a class="btn btn-inverse" href="checkout.php" id="checkout">Checkout</a></p>';
			}
			else {
		?>
		<div id="usercred">
			<button id="sin"  class="btn btn-default">Sign In</button>
			<button id="sup" class="btn btn-default">Sign Up</button>
		</div>
		<div id="signin" style="float: left;">
			<?php if($_SESSION["state"] == "login") {echo 'Invalid Information';} ?>
			<form method="POST" action="login.php">
				<input type="email" name="email" placeholder="E-Mail" required>
				<br>
				<input type="password" name="pwd" placeholder="Password" required>
				<br>
				<input type="submit" value="Login"  class="btn btn-default">
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
				<?php
					unset($_SESSION["state"]);
				?>
				<input type="text" name="univ" placeholder="University/College" required>
				<br>
				<input type="text" name="depart" placeholder="Department" required>
				<br>
				<textarea rows="4" cols="30" maxlength="300" wrap="hard" name="addres" placeholder="Address" required></textarea>
				<br>
				<input type="password" id="pwd" name="pwd" placeholder="Password" required>
				<br>
				<input type="password" id="pwd" name="pwd2" placeholder="Confirm Password" required>
				<br>
				<input type="submit" id="submt" value="Register"  class="btn btn-default">
				<br>
			</form>
		</div>
		<?php }
		?>
		<div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
			<div class="container"> 
				<div class="navbar-text pull-left">
					<p>All The Rights Reserveds</p>
				</div>
			</div>
		</div>
	</body>
</html>
