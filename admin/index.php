<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta name="view port" content="width=device-width, initial scale=1">
		<title>Admin Login</title>	
		<link type="text/css" href="./css/adminlogin.css" rel="stylesheet"/>
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
	<h2>Admin Login</h2>
		<div class="customer">
		<form class="form-inline" action="login.php" method = "POST">
			<label for="admin">Username: </label><br>
			<input type="text" id="admin" name="admin" required>
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
</body>
</html>
