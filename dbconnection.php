<?php
	if (isset($_POST['log']))
		{
			$CustomerID = mysqli_real_escape_string($con,$_POST['CustomerID']);
			$Password = mysqli_real_escape_string($con,$_POST['Password']);
			
			if ($CustomerID!="" && $Password!="")
			{
					$sql = "SELECT id FROM users WHERE CustomerID = '$CustomerID' and Password = '$Password'";
					$result = mysqli_query($con,$sql);
								
								if ($count = mysqli_num_rows($result) > 0)	
					{
					header('location:index.php');
					}
					else
					{
					echo "WRONG PASSWORD";
					}
			}
		}

?>

