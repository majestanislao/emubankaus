<?php
		// creating database connection				
		$con = mysqli_connect('localhost', 'root', '', 'emubank');
?>
<html>
<head>
<title> Header</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./css/header.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>	
<!--logo position in the header-->
		<div class "logo">
		<img src="images/emu.png" alt='Official logo' width='300px' height='100px'></a>
		</div>
<!-- Navigation links-->
		<div class= "navbar">
		<a href="index.php">Customer Details</a>
		<a href="addcustomer.php">Add Customer</a>
		<a href="addaccount.php">Add Account</a>
		<a href="logout.php">Logout</a>
		</div>
</header>
</body>
</html>