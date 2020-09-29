<?php

// Creating a function "alert" in PHP
function alert($msg) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
	return false;
}

// creating database connection				
$con = mysqli_connect('localhost', 'root', '', 'emubank');
$customerid = $_GET['ID'];

// The below code will be executed when user try to submit the data
if (isset ($_POST['update']))
// getting data 
{
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$postcode = $_POST['postcode'];

//data insert into database
	$sql = 	"UPDATE customers SET firstname = '{$firstname}', 
								  lastname = '{$lastname}', 
								  gender = '{$gender}', 
								  phone = '{$phone}', 
								  address = '{$address}', 
								  postcode = '{$postcode}' 
			WHERE customerid = $customerid";
	$result = mysqli_query($con,$sql);

	if ($result)
// if database is not connected or query is not executed, display error				
	{
		header("location:customerdetails.php?GetID=$customerid");
	}
	else
// if sql query is executed
	{
		$dberrormsg = "Error in connecting the database, please try again";
		alert($dberrormsg);
	}		
}

?>
