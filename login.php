<?php
session_start();
//creating a varaiable for any new register customer id and making it NULL
$registercustomerid = NULL;
if (isset($_REQUEST['register'])) 
	{
//if someone registered in the session, then make the varaible as the customer id of the new register customer
//since varaible is only in the URL if a customer is re-directed after registration, it will ensure that at all other time, the variable is NULL
		$registercustomerid = $_SESSION['lastcustomerid'];
//display the successful registergation message with the new customer id 
		$successmsg = "User Registered. Your customer id is $registercustomerid";
		echo "<script type='text/javascript'>alert('$successmsg');</script>";
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="view port" content="width=device-width, initial scale=1">
		<title>Login</title>	
		<link type="text/css" href="./css/login.css" rel="stylesheet"/>
	</head>
	<header>	
		<div class "emu">
		<img class="logo" src="Images/emu.png" alt="logo"></a>
		</div>
	</header>
<body>
	<div class="form">
	<h2>Login to Internet Banking</h2>
		<div class="customer">
		<form class="form-inline" action="login.php" method = "POST">
			<label for="customerid">Customer ID </label><br>
			<?php 
			//if someone registered in the session then the registercustomerid will not be null. and value of customer id will be displayed in customer id field
			if($registercustomerid != NULL)
			{
			?>
			<input type="text" id="customerid" name="customerid" value="<?php echo $registercustomerid;?>" required>
			<?php
			}
			//no customer id value in normal login session
			else
			{
			?>
			<input type="text" id="customerid" name="customerid"required>
			<?php
			}
			?>
			<br>
			<br>
			<label for="password">Password</label><br>
			<input type="password" id="password" name="password" required>
			<br>
			<br>
			<center><button type="login" class="btn" name="login">login</button> </center>
			<p id="login"></p>
		</form>
		</div>
	</div>
<main>
			<h1>First time here?</h1>
			<h2><a href="register.php">Join Emu Bank now</a> Register for free </h2>
</main>
<?php
	include 'footer.php';
?>
</body>
</html>

<?php
// Creating a function "alert" in PHP
function alert($msg) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
	return false;
}

// creating database connection				
$con = mysqli_connect('localhost', 'root', '', 'emubank');


//when login button is clicked
if (isset($_POST['login']))
{
//getting entered data and assigning customer id to a session varaiable
	$_SESSION['customerid'] = mysqli_real_escape_string($con,$_POST['customerid']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
//if customer ID and password is filled
	if ($_SESSION['customerid']!="" && $password!="")
	{
//validating if entered customerid exists in the database
		$customerid = "SELECT customerid FROM customers WHERE customerid = '{$_SESSION['customerid']}'";
		$customeridresult = mysqli_query($con,$customerid);
		if (mysqli_num_rows($customeridresult) == 0)
		{
			$customeriderror = "CustomerID is not valid. Contact Bank";
			alert($customeriderror);
		}
		else
		{
//validating the data from database i.e. customer id and password match with any data in database
		$loginvalidation = "SELECT customerid FROM customers WHERE customerid = '{$_SESSION['customerid']}' and password = '{$password}'";
		$loginresult = mysqli_query($con,$loginvalidation);
//if query return any rows			
			if (mysqli_num_rows($loginresult) > 0)	
			{
//creating session varaible logged in and assigning the value of this varaiable as 1 or true
				$_SESSION['loggedin']='1';
//relocating to index page in case login is success	
				header("location:index.php");
			}
				else
			{
//display error mesage if query return 0 rows
				$loginerror = "CustomerID and Password do not match";
				alert($loginerror);
			}
		}	
	}
}
?>
