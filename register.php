<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="view port" content="width=device-width, initial scale=1">
	<title>Register for EMU banking</title>	
	<link type="text/css" href="./css/register.css" rel="stylesheet"/>
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
	<h2>Register for EMU Banking</h2>
	<form class="elements" action="dbconnection.php" method = "POST">
<div class="inputfield">
	<label> First Name: </label>
    <input type="text" id="firstname" name="firstname"><br>
</div>
<div class="inputfield">
	<label>Last Name: </label>
    <input type="text" id="lastname" name="lastname"><br>
</div>
<div class="inputfield">		
	<label>Gender: </label>
	<div class="selectone">
		<select> 
		<option value = "select">Select</option>
		<option value = "male">Male</option>
		<option value = "female">Female</option>
		</select><br>
	</div>
</div>
<br>
<div class="inputfield">		
	<label>Email ID: </label>
    <input type="text" id="emailid" name="emailid"><br>
</div>
<div class="inputfield">
	<label>Contact number: </label>
	<input type="text" id="contactno" name="contactno"><br>
</div>
<div class="inputfield">
	<label>Address: </label><br>
	<textarea class="textarea"> </textarea><br>
</div>
<div class="inputfield">
	<label>Post code: </label>
	<input type="text" id="pcode" name="postcode"><br>
</div>
<div class="inputfield">
	<label>Password: </label>
	<input type="password" id="password" name="password"><br>
</div>
<div class="inputfield">
	<label>Confirm Password: </label>
	<input type="password" id="Cpassword" name="Cpassword"><br>
</div>
<div>
		<center><button type="Submit" class="btn" name="register">Register</button> </center>
	<p id="register"></p>
</div>
  </form>
</div>

</body>
</html>