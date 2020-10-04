<?php
session_start();
// Creating a function "alert" in PHP
function alert($msg) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
	return false;
}

//if admin not logged in, the other pages re-direct it to login page with 'loginerror' variable in URL
if (isset($_REQUEST['loginerror'])) 
	{
//display the error message 
		$loginmsg = "You are not logged in, please login to continue";
		alert($loginmsg);
	}
//when admin logged out, it re-drects to login page with 'logout' variable in URL
if (isset($_REQUEST['logout'])) 
	{
//display that admin is successfully logout
		$logoutmsg = "You are successfully log out";
		alert($logoutmsg);
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="view port" content="width=device-width, initial scale=1">
		<title>Login</title>	
		<link type="text/css" href="./css/login.css" rel="stylesheet"/>
	</head>
	<header>	
		<div class "emu">
		<img class="logo" src="Images/emu.png" alt="logo"></a>
		</div>
	</header>
<body>
	<div class="form">
	<h2>Admin Login</h2>
		<div class="customer">
		<form class="form-inline" action="login.php" method = "POST">
			<label for="username">Username: </label><br>
			<input type="text" id="username" name="username" required>
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

<?php

// creating database connection				
$con = mysqli_connect('localhost', 'root', '', 'emubank');

//when login button is clicked
if (isset($_POST['login']))
{
//getting entered data and assigning username to a session varaiable
	$_SESSION['username'] = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
		
//if username and password is filled
	if ($_SESSION['username']!="" && $password!="")
//validating if entered username exists in the database
	{
		$username = "SELECT username FROM admin WHERE username = '{$_SESSION['username']}'";
		$usernameresult = mysqli_query($con,$username);
		if (mysqli_num_rows($usernameresult) == 0)
		{
			$usernameerror = "Username is not valid. Contact IT Department";
			alert($usernameerror);
		}
		else
//validating the data from database i.e. username and password match with any data in database
		{
		$sql = "SELECT username FROM admin WHERE username = '{$_SESSION['username']}' and password = '{$password}'";
		$result = mysqli_query($con,$sql);
//if query return any rows			
			if (mysqli_num_rows($result) > 0)	
			{
//creating session varaible logged in and assigning the value of this varaiable as 1 or true
				$_SESSION['admin']='1';
//relocating to index page in case login is success	
				header("location:index.php");
			}
				else
			{
//display error mesage if query return 0 rows
				$loginerror = "Username and Password do not match";
				alert($loginerror);
			}
		}
	}
}
?>
