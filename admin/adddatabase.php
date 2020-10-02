<?php
session_start();

// Creating a function "alert" in PHP
function alert($msg) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
	return false;
}

function password_generate($chars) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}

// creating database connection				
$con = mysqli_connect('localhost', 'root', '', 'emubank');

// The below code will be executed when user try to submit the data
if (isset ($_POST['addcustomer']))
// getting data 
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$emailid = $_POST['emailid'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$postcode = $_POST['postcode'];
		$password = password_generate(8);
		

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
				header("location:customerdetails.php");
			}
					
		}
	}
	
if (isset ($_POST['addaccount']))
// getting data 
	{
		$customerid = $_POST['customerid'];
		$openingbal = $_POST['openingbal'];
		
		$checkid = mysqli_query($con, "select * from customers where customerid = '$customerid'");
	
		if (mysqli_num_rows($checkid)==0)
//execute if mysqliquery returns true
		{
			$iderrormsg = "Customer ID is invalid, please try again";
			alert($iderrormsg);
		}
		else
//execute if mysqliquery returns false
		{
//data insert into database
			$sql = 	"INSERT INTO accounts (bsbno, openingbal, balance, customerid) 
					VALUES ('302420', '$openingbal', '$openingbal', '$customerid')";
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
				//$successmsg = "Customer Account Details has been Created. Request customer to login to confirm";
				//alert($successmsg);
				
				header("location: customerdetails.php?");
			}
		}
	}
?>
