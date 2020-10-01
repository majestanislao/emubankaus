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
		<img class="logo" src="Images/emu.png" alt="logo"></a>
		</div>
	</header>
<body>
	<div class="form">
	<h1>Login to Internet Banking</h1>
		<div class="customer">
		<form class="form-inline" action="login.php" method = "POST">
			<label for="customerid">Customer ID </label><br>
			<input type="text" id="customerid" name="customerid" required>
			<br>
			<br>
			<label for="password">Password</label><br>
			<input type="password" id="password" name="password" required>
			<br>
			<br>
			<center><button type="login" class="btn" name="login">login</button> </center>
			<p id="login"></p>
		</form>
		</div>
	</div>
<main>
			<h1>First time here?</h1>
			<h2><a href="register.php">Join Emu Bank now</a> Register for free </h2>
</main>
</body>
</html>
