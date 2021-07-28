<!DOCTYPE HTML>
<html>
<head>
<title>Online Learning System Designed By Matrix Software Technologies</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Online Learning System Designed By Matrix Software Technologies" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery-ui.css"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
<body oncontextmenu="return false;">
	<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
		<h2>Sign In</h2>
		<?php
		if (isset($_GET['success']))
		{
			if ($_GET['success']=='I')
			{
		?>
				<div class="alert alert-danger" role="alert">
					<strong>Oops!</strong> Incorrect username and password.
				</div>
		<?php
			}
			if ($_GET['success']=='B')
			{
		?>
				<div class="alert alert-danger" role="alert">
					<strong>Oops!</strong> Please enter username and password.
				</div>
		<?php
			}
			if ($_GET['success']=='D')
			{
		?>
				<div class="alert alert-danger" role="alert">
					<strong>No!</strong> You cannot access this page without username and password.
				</div>
		<?php
			}
			
		}
		?>
		<form action="login_db.php" method="post">
			<div class="username">
				<span class="username">Username:</span>
				<input type="text" name="adminusername" id="adminusername" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="adminpassword" id="adminpassword" class="password" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="rem-for-agile">
				<input type="checkbox" name="remember" class="remember">Remember me<br>
				<a href="#">Forgot Password</a><br>
			</div>
			<div class="login-w3">
					<input type="submit" class="login" value="Sign In">
			</div>
			<div class="clearfix"></div>
		</form>
				<div class="back">
					<a href="index.html">Back to home</a>
				</div>
	</div>
	</div>
	</div>
</body>
</html>