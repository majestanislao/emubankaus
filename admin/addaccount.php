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
	<h2>Add account to the customer</h2>
	<form name="addform" class="elements" action="adddatabase.php" method = "POST">
<div class="inputfield">
	<<label>CustomerID: (Enter 8 Digit CustomerID) </label>
	<input type="tel" id="customerid" name="customerid" pattern="[0-9]{8}" required 
	value="<?php if(isset($_POST['phone'])){echo htmlentities ($_POST['phone']);}?>"><br>
<div class="inputfield">
	<label>Opening Balance:</label>
	<input type="number" id="openingbal" name="openingbal" placeholder="Enter an amount e.g. 125.00" step=".01" required> <br>
</div>

<div>
	<center><button type="Submit" class="addaccountbtn" name="addaccount">Add Account</button> </center>
	<p id="addaccount"></p>
</div>
  </form>
</div>
</body>
</html>