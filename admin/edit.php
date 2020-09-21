<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="view port" content="width=device-width, initial scale=1">
	<title>Update Customer Record for EMU banking</title>	
	<link type="text/css" href="./css/edit.css" rel="stylesheet"/>
	<?php
		$con = mysqli_connect('localhost', 'root', '', 'emubank');
		$customerid = $_GET['GetID'];
		$query = "select *from customers where customerid = '".$customerid."'";
		$result = mysqli_query($con,$query);
		while($row = mysqli_fetch_assoc($result))
		{
			$firstname = $row['firstname'];
			$lastname = $row['lastname'];
			$gender = $row['gender'];
			$emailid = $row['emailid'];
			$phone = $row['phone'];
			$address = $row['address'];
			$postcode = $row['postcode'];
		}
	?>	
</head>

<header>
<div class "emu">
<img src="images/emu.png" alt='Official logo' width='300px' height='100px'></a>

</div>

</header>

<body>

<div class="form">
	<h2>Update Customer Record for EMU Banking</h2>
	<form name="updateform" class="elements" action="update.php?ID=<?php echo $customerid ?>" method = "POST">
<div class="inputfield">
	<label> First Name: </label>
    <input type="text" id="firstname" name="firstname" required 
	value="<?php echo $firstname ?>"><br>
</div>
<div class="inputfield">
	<label>Last Name: </label>
    <input type="text" id="lastname" name="lastname" required 
	value="<?php echo $lastname ?>"><br>
</div>
<div class="inputfield">		
	<label>Gender:</label>
	<input type="radio" id= "gender" name="gender" required value="male"> Male
	<input type="radio" id= "gender" name="gender" required value="female"> Female<br>	
	</div>
<br>
<div class="inputfield">
	<label>Phone: (Enter 10 Digit Phone Number) </label>
	<input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required 
	value="<?php echo $phone ?>"><br>
</div>

<div class="inputfield">
	<label>Address: </label><br>
	<input <textarea type="text" class="textarea" id="address" name = "address" required 
	value="<?php echo $address ?>"</textarea><br>
</div>
<div class="inputfield">
	<label>Postcode: (Enter 4 Digit Postcode)</label>
	<input type="tel" id="postcode" name="postcode" pattern="[0-9]{4}" required 
	value="<?php echo $postcode ?>"><br>
</div>
<div>
	<center><button type="Submit" class="updatebtn" name="update">Update</button> </center>
	<p id="update"></p>
</div>

	</form>


</div>