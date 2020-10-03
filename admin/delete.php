<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Delete Customer Record for EMU banking</title>	
	<link type="text/css" href="./css/edit.css" rel="stylesheet"/>

</head>

<header>	
		<div class "emu">
		<img class="logo" src="Images/emu.png" alt="logo"></a>
		</div>
</header>

<body>
<?php
$customerid = $_GET['GetCID'];
?>

<div class="form">
	<h2>Are you sure you want to Delete record of Customer <?php echo $customerid;?>?</h2>
	<form name="deleteform" class="elements" action="delete.php?GetCID=<?php echo $customerid ?>" method = "POST">
	<button type="submit" class="yesbtn" name="yes">Yes</button>
	<button type="submit" class="nobtn" name="no">No</button>
</div>

</form>
</html>

<?php
	if (isset ($_POST['yes']))
	{
		$con = mysqli_connect('localhost', 'root', '', 'emubank');
		$delete = "delete from customers where customerid = '$customerid'";
						
		if (mysqli_query($con,$delete))
		{
			header("location:index.php?delete");
		}
		else
		{
			echo "error in query";
		}
	}
	elseif (isset ($_POST['no']))
	{
			header("location:index.php");
	}
?>