<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="view port" content="width=device-width, initial scale=1">
	<title>Register for EMU banking</title>	
	<link type="text/css" href="./css/register.css" rel="stylesheet"/>
		
</head>

<header>
<div class "emu">
<img src="images/emu.png" alt='Official logo' width='300px' height='100px'></a>

</div>

</header>

<body>
<?php

if (isset ($_POST['register']))
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$emailid = $_POST['emailid'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$postcode = $_POST['postcode'];
		$password = $_POST['password'];
		
		
		
		$customerscon = mysqli_connect('localhost', 'root', '');
		
		if(!$customerscon)
		{
			echo 'Not connected';
		}
		
		if (!mysqli_select_db ($customerscon, 'customers'))
		{
			echo 'database not connected';
		}
		else
		{
			echo 'database connected';
		}
		
		$customerssql = 	"INSERT INTO registration (firstname, lastname, gender, emailid, phone, address, postcode, password) 
		VALUES ('$firstname', '$lastname', '$gender', '$emailid', '$phone', '$address', '$postcode', '$password')";
		
		if (!mysqli_query($customerscon,$customerssql))
		{
			echo 'data not inserted';
		}
		else
		{
			echo 'inserted';
		}
	}	

?>


<div class="form">
	<h2>Register for EMU Banking</h2>
	<form class="elements" action="register.php" method = "POST">
<div class="inputfield">
	<label> First Name: </label>
    <input type="text" id="firstname" name="firstname" required><br>
</div>
<div class="inputfield">
	<label>Last Name: </label>
    <input type="text" id="lastname" name="lastname" required><br>
</div>
<div class="inputfield">		
	<label>Gender: </label>
	<div class="selectone">
		<select name= "gender" required> 
		<option name= "gender" value = "select">Select</option>
		<option name= "gender" value = "male">Male</option>
		<option name= "gender" value = "female">Female</option>
		</select><br>
	</div>
</div>
<br>


<div class="inputfield">		
	<label>Email ID: </label>
    <input type="text" id="emailid" name="emailid" required><br>
</div>

<div class="inputfield">
	<label>Phone: </label>
	<input type="text" id="phone" name="phone"><br>
</div>

<div class="inputfield">
	<label>Address: </label><br>
	<textarea class="textarea" name = "address"> </textarea><br>
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

		<center><button type="Submit" class="registerbtn" name="register">Register</button> </center>
	<p id="register"></p>
</div>
  </form>
</div>

</body>
</html>