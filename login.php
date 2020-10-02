<?php
session_start();
$registercustomerid = NULL;
if (isset($_REQUEST['register'])) 
	{
		$registercustomerid = $_SESSION['lastcustomerid'];
		$successmsg = "User Registered. Your client id is $registercustomerid";
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
			<?php if($registercustomerid != NULL)
			{
			?>
			<input type="text" id="customerid" name="customerid" value="<?php echo $registercustomerid;?>" required>
			<?php
			}
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
//getting entered data
	$_SESSION['customerid'] = mysqli_real_escape_string($con,$_POST['customerid']);
	$_SESSION['password'] = mysqli_real_escape_string($con,$_POST['password']);
		
//if customer ID and password is filled
	if ($_SESSION['customerid']!="" && $_SESSION['customerid']!="")
//validating the data from database
	{
		$sql = "SELECT customerid FROM customers WHERE customerid = '{$_SESSION['customerid']}' and password = '{$_SESSION['password']}'";
		$result = mysqli_query($con,$sql);
							
			if ($count = mysqli_num_rows($result) > 0)	
			{
				$_SESSION['loggedin']='1';
				header("location:index.php");
			}
				else
			{
				$loginerror = "CustomerID and Password do not match";
				alert($loginerror);
			}
	}
}
?>
