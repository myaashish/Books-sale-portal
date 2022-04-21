<!---
Author: Aashish Parmar (parmaraashish3@gmail.com)

List products(books) based on institution name.
--->

<?php
	session_start();
?>
<html>
	<head>
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
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<title></title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6x col-xs-6 logo wow fadeIn" style="width: unset;">
					<img alt="Logo" class="img-responsive" src="images/Logo.png"  style="float:right;width:120px;height:180px; padding-top:50px">
				</div>
			</div>
		</div>
		<?php
			if($_SESSION["email"] != "") { 
				echo 'Welcome ' . $_SESSION["name"] . '<br><a href="logout.php">Logout</a>';
			}
			$db = mysql_connect("localhost","$user","$pass");
			mysql_select_db("smlib",$db);
			$query = mysql_query("select distinct colname from college;", $db);
			echo '<div style="position: absolute; width: 100%; top: 45%;"><form action="books-list.php" method="POST" style="text-align: center;vertical-align: center;"> 
			<select name="college" style="width: 40%;margin-right: 10px;">';
			while($entry = mysql_fetch_array($query)) {
				echo '<option value="' . $entry["colname"] . '">' . $entry["colname"] . '</option>';
			}
			echo '</select><input class="btn btn-default" type="submit" value="Submit" style="margin-top: -10px; margin-left: 10px;"></form>';
		?>
		<div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
			<div class="container"> 
				<div class="navbar-text pull-left">
					<p>All The Rights Reserved</p>
				</div>
			</div>
		</div>
	</body>
</html>
