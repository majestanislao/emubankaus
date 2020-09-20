<?php
		// creating database connection				
		$con = mysqli_connect('localhost', 'root', '', 'emubank');
		$sql = mysqli_query($con, "select * from customers");
if	
	(isset($_GET['search']))
	{
    $customerid = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM customers WHERE customerid ='$customerid'";
}
	$return = $con->query($sql);
?>
<html>
<head>
<title> Search </title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./css/customerdetails.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class = "searchbutton" align = "right">
		<input type="text" placeholder="Start typing..">
		<button type="submit"><i class="fa fa-search"></i></button>
		</div>		
</body>
</html>
