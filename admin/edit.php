<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update Customer Record for EMU banking</title>	
	<link type="text/css" href="./css/edit.css" rel="stylesheet"/>
	<?php
		include 'header.php';
	?>	
</head>
<?php
//if session variable is true i.e. admin is logged in
if(isset($_SESSION['admin']))
{
//customerid varaible is assigned to the ID received in URL
	$customerid = $_GET['GetID'];
//query to select the customer record of that specific customer id from customers table	
	$query = "select *from customers where customerid = '".$customerid."'";
	$result = mysqli_query($con,$query);
//fetch the record
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
<body>
<!--display the form, with default values as per the customer record fetched-->
<!--Validation on input fields are as per the registration or addcustomer forms-->
<div class="form">
	<h2>Update Customer Record for EMU Banking</h2>
	<form name="updateform" class="elements" action="edit.php?GetID=<?php echo $customerid ?>" method = "POST">
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
	<?php
//condition to checked radio button according to the gender of the fetched record
	if ($gender == "male")
	{
	?>
	<input type="radio" id= "gender" name="gender" required value="male" checked> Male
	<input type="radio" id= "gender" name="gender" required value="female"> Female<br>	
	</div>
	<?php
	}
	elseif ($gender == "female")
	{
	?>
	<input type="radio" id= "gender" name="gender" required value="male"> Male
	<input type="radio" id= "gender" name="gender" required value="female" checked> Female<br>	
	</div>
	<?php
	}
	?>
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
<?php
}
// if session variable turns false that means cannot perform any operations on customers data 
// and redirect admin to login page with loginerror varaible in URL 
else
{
	header("location:login.php?loginerror");
}

// Creating a function "alert" in PHP
function alert($msg) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
	return false;
}
// The below code will be executed when user try to submit the data
if (isset ($_POST['update']))
// getting user entered data 
{
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$postcode = $_POST['postcode'];

//query to update data update into database
	$sql = 	"UPDATE customers SET firstname = '{$firstname}', 
								  lastname = '{$lastname}', 
								  gender = '{$gender}', 
								  phone = '{$phone}', 
								  address = '{$address}', 
								  postcode = '{$postcode}' 
			WHERE customerid = $customerid";
	$result = mysqli_query($con,$sql);
	
	if ($result)
// if sql query is executed	return to index page with success variable in URL	
	{
		header("location:index.php?success");
	}
	else
// if database is not connected or query is not executed, display error	
	{
		$dberrormsg = "Error in connecting the database, please try again";
		alert($dberrormsg);
	}		
}
?>