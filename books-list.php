<!---
Author: Aashish Parmar (parmaraashish3@gmail.com)

This file lists available books based on a given field of study.
--->

<?php
	session_start();
?>
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
		<script src=util.js type="text/javascript"></script>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
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
		<h1 id="collegename">
			<?php echo $_POST["college"]; $_SESSION["college"] = $_POST["college"]; ?>
		</h1>
		<div id="branch">
			<ul class="nav navbar-nav" id="collegename" style="width:100%;">
				<?php $db = mysql_connect("localhost","root","root");
					mysql_select_db("smlib",$db);
					$query = mysql_query('select branch from college where colname="' . mysql_real_escape_string($_POST["college"]) . '";', $db);
					while($entry = mysql_fetch_array($query)) {
						echo '<a href="#"><li class="branchname btn btn-default">' . $entry["branch"] . '</li></a>';
					}
				?>
			</ul>
		</div>
		<br><br>
		<div id="sem-list"></div>
	</body>
	<div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
		<div class="container"> 
			<div class="navbar-text pull-left">
				<p>All The Rights Reserved</p>
			</div>
		</div>
	</div>
</html>
