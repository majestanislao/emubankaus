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
						$lastcustomerid = mysqli_insert_id($con);
					//display the customer id that user will use to login
						$successmsg = "User Registered. Your client id is $lastcustomerid";
						alert($successmsg);
					}
					
				}
			}
			else
					{
						$passworderrormsg = "Password do not match";
						alert($passworderrormsg);
					}
		}

//when login button is clicked
if (isset($_POST['login']))
	{
//getting entered data
		$customerid = mysqli_real_escape_string($con,$_POST['customerid']);
		$password = mysqli_real_escape_string($con,$_POST['password']);
			
//if customer ID and password is filled
		if ($customerid!="" && $password!="")
//validating the data from database
		{
			$sql = "SELECT customerid FROM customers WHERE customerid = '$customerid' and password = '$password'";
			$result = mysqli_query($con,$sql);
								
				if ($count = mysqli_num_rows($result) > 0)	
				{
					header('location:index.php');
				}
					else
				{
					$loginerror = "CustomerID and Password do not match";
					alert($loginerror);
				}
			}
		}


?>
