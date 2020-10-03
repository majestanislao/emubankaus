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
//if session variable is true i.e. admin is logged in
if(isset($_SESSION['admin']))
{
//customerid is equal to the id passed through URL, and show the following HTML form
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
}
// if session variable turns false that means cannot perform any operations on customers data 
// and redirect admin to login page with loginerror varaible in URL 
else
{
	header("location:login.php?loginerror");
}
//if yes button is clicked
	if (isset ($_POST['yes']))
	{
//database connection
		$con = mysqli_connect('localhost', 'root', '', 'emubank');
//query to delete the record in customer table where customer id is the one passed in URL
		$delete = "delete from customers where customerid = '$customerid'";
//if record deleted, redirect to index page with delete varaible in URL 						
		if (mysqli_query($con,$delete))
		{
			header("location:index.php?delete");
		}
//if record is not deleted, display error
		else
		{
			echo "error in query";
		}
	}
//if no button is clicked, return to index page
	elseif (isset ($_POST['no']))
	{
			header("location:index.php");
	}
?>