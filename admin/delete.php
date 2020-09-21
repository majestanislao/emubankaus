<? php

	if (isset($_GET['Del']))
	{
		$con = mysqli_connect('localhost', 'root', '', 'emubank');
		$customerid = $_GET['Del'];
		$query = "delete from customers where customerid = '".$customerid."'";
		$result = mysqli_query($con, $result);
	
	
		if ($result)				
		{
			header("location:customerdetails.php");
		}
		else
		{
			echo "error in query";
		}
	}
?>