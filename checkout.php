<!---
Author: Aashish Parmar (parmaraashish3@gmail.com)

This file is used to checkout the items selected for purchase.
--->

<html>
	<head>
		<title></title>
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
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6x col-xs-6 logo wow fadeIn" style="width: unset;">
					<img alt="Logo" class="img-responsive" style="float:right;width:120px;height:180px; padding-top:50px" src="images/Logo.png"  style="float:right;width:200px;height:180px; padding-top:50px">
				</div>
			</div>
		</div>
		<?php
			session_start();
			if($_SESSION["email"] == "") {
				header('Location: institute.php');
			}
			$db = mysql_connect("localhost","$user","$pass");
			mysql_select_db("$db_name",$db);
			$qry = 'update users set referal="-----" where referal="' . $_SESSION["ref"] . '" limit 1;';
			$query = mysql_query($qry,$db);
			if(! $query) {
				die('<h1 id="finalstate">Some Update Error Occured</h1>');
			}
			$msg = "";
			foreach($_SESSION as $key => $value) {
				$msg = $msg . $key . ' : ' . $value . '\n';
				if($key != "name" && $key != "state" && $key != "ref" && $key != "branch" && $key != "college" && $key != "email" && $key != "sem" && $key != "cost" && $key != "phone") {
					$qry = 'insert into orders values("' . $_SESSION["email"] . '", "' . $value . '", "' . date("Y-n-j") . '");';
					$query = mysql_query($qry,$db);
					if(! $query) {
						die('<h1 id="finalstate">Some Input Error Occured</h1>');
					}
				}
			}
			mail("parmaraashish3@gmail.com","My subject",$msg);
			echo '<h1 id="finalstate">Your order is placed</h1><table class="table table-striped">';
			foreach($_SESSION as $key => $value) {
				if($key != "state" && $key != "ref") {
					echo '<tr><td style="text-align: center;">' . $key . '</td><td>' . $value . '</td><tr>';
				}
			}
			echo '</table>
			<br>You are required to bring this reciept at the time of collection of your books.<br>
			<button onclick=window.print() class="btn btn-success btn-block">Print this page</button>';
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
