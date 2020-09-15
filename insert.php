<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$emailid = $_POST['emailid'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$password = $_POST['password'];

//database connection
$con= mysqli_connect("localhost", "root", "", "customers");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

{
			$firstname = mysqli_real_escape_string($con,$_POST['firstname']);
			$lastname = mysqli_real_escape_string($con,$_POST['lastname']);
			$gender = mysqli_real_escape_string($con,$_POST['gender']);
			$emailid = mysqli_real_escape_string($con,$_POST['emailid']);
			$phone = mysqli_real_escape_string($con,$_POST['phone']);
			$address = mysqli_real_escape_string($con,$_POST['address']);
			$postcode = mysqli_real_escape_string($con,$_POST['postcode']);
			$password = mysqli_real_escape_string($con,$_POST['password']);
			
			
			
		
?>
