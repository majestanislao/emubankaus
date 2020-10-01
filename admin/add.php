<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="view port" content="width=device-width, initial scale=1">
	<title>Register for EMU banking</title>	
	<link type="text/css" href="./css/edit.css" rel="stylesheet"/>

</head>

<header>
<div class "emu">
<img src="images/emu.png" alt='Official logo' width='300px' height='100px'></a>

</div>

</header>

<body>

<div class="form">
	<h2>Register for EMU Banking</h2>
	<form name="addform" class="elements" action="adddatabase.php" method = "POST">
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

<div>
	<center><button type="Submit" class="addbtn" name="addcustomer">Add Customer</button> </center>
	<p id="addcustomer"></p>
</div>
  </form>
</div>
</body>
</html>