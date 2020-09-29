<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="view port" content="width=device-width, initial scale=1">
	<title>Delete Customer Record for EMU banking</title>	
	<link type="text/css" href="./css/edit.css" rel="stylesheet"/>

</head>

<header>
<div class "emu">
<img src="images/emu.png" alt='Official logo' width='300px' height='100px'></a>

</div>

</header>

<body>
<?php
$customerid = $_GET['GetCID'];
?>

<div class="form">
	<h2>Are you sure you want to Delete record of Customer <?php echo $customerid;?>?</h2>
	<form name="deleteform" class="elements" action="delete.php?GetCID=<?php echo $customerid ?>" method = "POST">
	<button type="Submit" class="yesbtn" name="yes">Yes</button>
	<button type="Submit" class="nobtn" name="no">No</button>
</div>

</form>
</html>

<?php
	if (isset ($_POST['yes']))
	{
		$con = mysqli_connect('localhost', 'root', '', 'emubank');
		$sql = 	"DELETE from customers WHERE customerid = $customerid";
		$result = mysqli_query($con,$sql);
		
		if ($result)
		{
			header("location:customerdetails.php");
		}
		else
		{
			echo "error in query";
		}
	}
	elseif (isset ($_POST['no']))
	{
			header("location:customerdetails.php");
	}
?>