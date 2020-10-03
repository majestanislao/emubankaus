<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Account for Existing Customer</title>	
	<link type="text/css" href="./css/edit.css" rel="stylesheet"/>
	<?php
				include 'header.php';
	?>
</head>



<body>
<?php
if(isset($_SESSION['admin']))
{
?>
<div class="form">
	<h2>Add account to an existing customer</h2>
	<form name="addform" class="elements" action="addaccount.php" method = "POST">
<div class="inputfield">
	<label>CustomerID: (Enter 8 Digit CustomerID) </label>
	<input type="tel" id="customerid" name="customerid" pattern="[0-9]{8}" required 
	value="<?php if(isset($_POST['phone'])){echo htmlentities ($_POST['phone']);}?>"><br>
<div class="inputfield">
	<label>Opening Balance:</label>
	<input type="number" id="openingbal" name="openingbal" placeholder="Enter an amount e.g. 125.00" step=".01" required> <br>
</div>

<div>
	<center><button type="Submit" class="addaccountbtn" name="addaccount">Add Account</button> </center>
	<p id="addaccount"></p>
</div>
  </form>
</div>
</body>
</html>
<?php
}
else
{
	header("location:login.php?loginerror");
}

function alert($msg) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
	return false;
}

if (isset ($_POST['addaccount']))
// getting data 
	{
		$customerid = $_POST['customerid'];
		$openingbal = $_POST['openingbal'];
		
		$checkid = mysqli_query($con, "select * from customers where customerid = '$customerid'");
		$duplicate = mysqli_query($con, "select * from accounts where customerid = '$customerid'");
		
		if (mysqli_num_rows($checkid)==0)
//execute if mysqliquery returns true
		{
			$iderrormsg = "Customer ID is invalid, please try again";
			alert($iderrormsg);
		}
		elseif (mysqli_num_rows($duplicate)>0)
		{
			$duplicatemsg = "This Customer ID already has an existing account.";
			alert($duplicatemsg);
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

				header("location: index.php?addaccount");
			}
		}
	}
?>