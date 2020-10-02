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
	<label>Gender:</label>
	<input type="radio" id= "gender" name="gender" required value="male"> Male
	<input type="radio" id= "gender" name="gender" required value="female"> Female<br>	
	</div>
<br>
<div class="inputfield">		
	<label>Email ID: </label>
    <input type="email" id="emailid" name="emailid" required 
	value="<?php if(isset($_POST['emailid'])){echo htmlentities ($_POST['emailid']);}?>"><br>
</div>

<div class="inputfield">
	<label>Phone: (Enter 10 Digit Phone Number) </label>
	<input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required 
	value="<?php if(isset($_POST['phone'])){echo htmlentities ($_POST['phone']);}?>"><br>
</div>

<div class="inputfield">
	<label>Address: </label><br>
	<input <textarea type="text" class="textarea" id="address" name = "address" required 
	value="<?php if(isset($_POST['address'])){echo htmlentities ($_POST['address']);}?>"></textarea><br>
</div>
<div class="inputfield">
	<label>Postcode: (Enter 4 Digit Postcode)</label>
	<input type="tel" id="postcode" name="postcode" pattern="[0-9]{4}" required 
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
<main>
		<br>
			<h1>Login to use EMU bank services</h1>
			<p><h2><a href="login.php">Login</a></h2></p>
		<br>

	</main>
<?php
	include 'footer.php';
?>
</body>
</html>

<?php
session_start();

// Creating a function "alert" in PHP
function alert($msg) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
	return false;
}

// creating database connection				
$con = mysqli_connect('localhost', 'root', '', 'emubank');


// The below code will be executed when user try to submit the data
if (isset ($_POST['register']))
// getting data 
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

// checking if both password matches 
	if ($password === $Cpassword)
	{
// checking if emailid already exist or not 				
		$duplicate = mysqli_query($con, "select * from customers where emailid = '$emailid'");
				
		if (mysqli_num_rows($duplicate)>0)
//execute if mysqliquery returns true
		{
			$emailerrormsg = "Email id is already in use";
			alert($emailerrormsg);
		}
		else
//execute if mysqliquery returns false

		{
//data insert into database
			$sql = 	"INSERT INTO customers (firstname, lastname, gender, emailid, phone, address, postcode, password) 
					VALUES ('$firstname', '$lastname', '$gender', '$emailid', '$phone', '$address', '$postcode', '$password')";
			

			if (!mysqli_query($con,$sql))
// if database is not connected or query is not executed, display error				
			{
				$dberrormsg = "Error in connecting the database, please try again";
				alert($dberrormsg);
			}
			else
// if sql query is executed
			{
			//get the last inserted Customer ID
				$_SESSION['lastcustomerid'] = mysqli_insert_id($con);
			//display the customer id that user will use to login
				header("location: login.php?register");
			}
			
		}
	}
	else
	{
		$passworderrormsg = "Password do not match";
		alert($passworderrormsg);
	}
}
?>
