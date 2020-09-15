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
		$Cpassword = $_POST['Cpassword'];
		
		$customerscon = mysqli_connect('localhost', 'root', '', 'customers');
		
			if ($password === $Cpassword)
			{
				$duplicate = mysqli_query($customerscon, "select * from registration where emailid = '$emailid'");
			
				if (mysqli_num_rows($duplicate)>0)
				{
					$msg = "Email id is already in use";
					header("Location: register.php?msg=$msg");
				}
				else
				{
					$customerssql = 	"INSERT INTO registration (firstname, lastname, gender, emailid, phone, address, postcode, password) 
										VALUES ('$firstname', '$lastname', '$gender', '$emailid', '$phone', '$address', '$postcode', '$password')";
		
					if (!mysqli_query($customerscon,$customerssql))
					{
						echo 'data not inserted';
					}
					else 		
					{
						echo 'User Registered';
					}
				}
			}
			else
			{
				$msg = "Password don't match";
				header("Location: register.php?msg=$msg");
			}
		}
?>

<div class="form">
	<h2>Register for EMU Banking</h2>
	<form name="registerationform" class="elements" action="register.php" method = "POST">
<div class="inputfield">
	<label> First Name: </label>
    <input type="text" id="firstname" name="firstname" required 
	value="<?php if(isset($_POST['firstname'])){echo htmlentities ($_POST['firstname']);}?>"><br>
</div>
<div class="inputfield">
	<label>Last Name: </label>
    <input type="text" id="lastname" name="lastname" required 
	value="<?php if(isset($_POST['lastname'])){echo htmlentities ($_POST['lastname']);}?>"><br>
</div>
<div class="inputfield">		
	<label>Gender: </label>
	<div class="selectone">
		<select id="gender" name= "gender" required 
		value="<?php if(isset($_POST['gender'])){echo htmlentities ($_POST['gender']);}?>"> 
		<option name= "gender" value = "select">Select</option>
		<option name= "gender" value = "male">Male</option>
		<option name= "gender" value = "female">Female</option>
		</select><br>
	</div>
</div>
<br>
<div class="inputfield">		
	<label>Email ID: </label>
    <input type="email" id="emailid" name="emailid" required 
	value="<?php if(isset($_POST['emailid'])){echo htmlentities ($_POST['emailid']);}?>"><br>
</div>

<div class="inputfield">
	<label>Phone: </label>
	<input type="text" id="phone" name="phone" required 
	value="<?php if(isset($_POST['phone'])){echo htmlentities ($_POST['phone']);}?>"><br>
</div>

<div class="inputfield">
	<label>Address: </label><br>
	<input <textarea type="text" class="textarea" id="address" name = "address" required 
	value="<?php if(isset($_POST['address'])){echo htmlentities ($_POST['address']);}?>"></textarea><br>
</div>
<div class="inputfield">
	<label>Post code: </label>
	<input type="text" id="pcode" name="postcode" required 
	value="<?php if(isset($_POST['postcode'])){echo htmlentities ($_POST['postcode']);}?>"><br>
</div>
<div class="inputfield">
	<label>Password: </label>
	<input type="password" id="password" name="password" required 
	value="<?php if(isset($_POST['password'])){echo htmlentities ($_POST['password']);}?>"><br>
</div>
<div class="inputfield">
	<label>Confirm Password: </label>
	<input type="password" id="Cpassword" name="Cpassword" required 
	value="<?php if(isset($_POST['Cpassword'])){echo htmlentities ($_POST['Cpassword']);}?>"><br>
</div>

<div>

		<center><button type="Submit" class="registerbtn" name="register">Register</button> </center>
	<p id="register"></p>
</div>
  </form>
</div>

</body>
</html>