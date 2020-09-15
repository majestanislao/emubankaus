<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta name="view port" content="width=device-width, initial scale=1">
		<title>Login</title>	
		<link type="text/css" href="./css/login.css" rel="stylesheet"/>
		<?php
		include "dbconnection.php";
		?>	
	</head>
	<header>	
		<div class "emu">
		<img src="images/emu.png" alt='Official logo' width='300px' height='100px'></a>
		</div>
	</header>
<body>
	<div class="form">
	<h2>Login to Internet Banking</h2>
		<div class="customer">
		<form class="form-inline" action="dbconnection.php" method = "POST">
			<label for="CustomerID">Customer ID </label><br>
			<input type="text" id="CustomerID" name="CustomerID">
			&nbsp; <a href="forgotID.html"> Forgot your Customer ID?</a>
			<br>
			<br>
			<label for="Password">Password</label><br>
			<input type="text" id="Password" name="Password">
			&nbsp; <a href="forgotpass.html"> Forgot your Password?</a>
			<br>
			<br>
			<center><button type="login" class="btn" name="log">login</button> </center>
			<p id="login"></p>
		</form>
		</div>
	</div>
	<main>
		<br>
			<h1>First time here?</h1>
			<p><h2><a href="register.php">Join Emu Bank now</a> Register for free </h2></p>
		<br>

	</main>
</body>
</html>