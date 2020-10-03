<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="view port" content="width=device-width, initial scale=1">
	<title>Update Customer Record for EMU banking</title>	
	<link type="text/css" href="./css/edit.css" rel="stylesheet"/>
	<?php
		include 'header.php';
	?>	
</head>
<?php
if(isset($_SESSION['admin']))
{
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
<body>

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
		header("location:index.php?success");
	}
	else
// if sql query is executed
	{
		$dberrormsg = "Error in connecting the database, please try again";
		alert($dberrormsg);
	}		
}
?>