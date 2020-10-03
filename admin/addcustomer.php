<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Customer for EMU banking</title>	
	<link type="text/css" href="./css/edit.css" rel="stylesheet"/>
	<?php
		include 'header.php';
	?>	
</head>
<?php
//if session variable is true i.e. admin is logged in, show the form as per the HTML code below
if(isset($_SESSION['admin']))
{
?>
<body>

<div class="form">
	<h2>Register for EMU Banking</h2>
<!-- Creating form for customer registration-->
	<form name="addform" class="elements" action="addcustomer.php" method = "POST">
<!-- Creating input fields. All fields have required parameter making sure, form is only submitted once all fields are filled-->
<!-- value parameter is setup with php code , such that in case of error, entered data is not lost-->
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
<!--Radio button to choose the gender-->
<div class="inputfield">		
	<label>Gender:</label>
	<input type="radio" id= "gender" name="gender" required value="male"> Male
	<input type="radio" id= "gender" name="gender" required value="female"> Female<br>	
	</div>
<br>
<!--Email data type ensures that user input is according to the email format i.e. xyz@abc.com-->
<div class="inputfield">		
	<label>Email ID: </label>
    <input type="email" id="emailid" name="emailid" required 
	value="<?php if(isset($_POST['emailid'])){echo htmlentities ($_POST['emailid']);}?>"><br>
</div>
<!--Pattern ensures that 10-digit phone number is entered by user-->
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
<!--Pattern ensures that 4-digit postcode is entered by user-->
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
<?php
}
// if session variable turns false that means cannot perform any operations on customers data 
// and redirect admin to login page with loginerror varaible in URL 
else
{
	header("location:login.php?loginerror");
}
//function to generate automatic password, with specific length passed through parameter $chars
function password_generate($chars) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}

function alert($msg) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
	return false;
}

// The below code will be executed when user try to submit the data
if (isset ($_POST['addcustomer']))
// getting user input data and calling function to generate 8-character password 
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$emailid = $_POST['emailid'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$postcode = $_POST['postcode'];
		$password = password_generate(8);
// checking if emailid already exist or not 
		$duplicate = mysqli_query($con, "select * from customers where emailid = '$emailid'");
				
		if (mysqli_num_rows($duplicate)>0)
//execute if mysqliquery returns more than 0 rows i.e. email id already in the database record
		{
			$emailerrormsg = "Email id is already in use";
			alert($emailerrormsg);
		}
		else
//execute if mysqliquery returns no rows i.e. new email id is entered by user
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
//return to index page with addcustomer varaiable in URL 
				header("location:index.php?addcustomer");
			}
					
		}
	}
?>