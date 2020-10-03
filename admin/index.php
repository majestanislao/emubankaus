<?php
session_start();
if (isset($_REQUEST['success'])) 
	{
//if admin not logged in, the other pages re-direct it to login page with 'loginerror' variable in URL
//display the error message 
		$successmsg = "Customer Data is sucessfully updated";
		echo "<script type='text/javascript'>alert('$successmsg');</script>";
	}
if (isset($_REQUEST['addcustomer'])) 
	{
//if admin not logged in, the other pages re-direct it to login page with 'loginerror' variable in URL
//display the error message 
		$addcustomermsg = "New Customer is successfully added";
		echo "<script type='text/javascript'>alert('$addcustomermsg');</script>";
	}
if (isset($_REQUEST['delete'])) 
	{
//if admin not logged in, the other pages re-direct it to login page with 'loginerror' variable in URL
//display the error message 
		$deletemsg = "Selected Customer is deleted";
		echo "<script type='text/javascript'>alert('$deletemsg');</script>";
	}
if (isset($_REQUEST['addaccount'])) 
	{
//if admin not logged in, the other pages re-direct it to login page with 'loginerror' variable in URL
//display the error message 
		$deletemsg = "Customer Account Details has been Created. Request customer to login to confirm";
		echo "<script type='text/javascript'>alert('$deletemsg');</script>";
	}
?>

<!DOCTYPE html> 
<html lang="en">
<head>
		<title>Customer Details</title>
		<link rel="stylesheet" href="./css/customerdetails.css" rel="stylesheet"/>
<!-- including header file -->
		<?php
				include 'header.php';
		?>	
</head>

<body>	
<?php
//if session variable is true i.e. user is logged in
if(isset($_SESSION['admin']))
{
?>	
<h1> Customer Details </h1>
<!--creating table headings for customer details -->
	<table align="center" width="100%">
		<tr>
			<th>CustomerID</th>
			<th>BSB & Account No</th>
			<th>First name</th>
			<th>Last name</th>
			<th>Gender</th>
			<th>Email ID</th>
			<th>Phone</th>
			<th>Address</th>
			<th>Post code</th>
			<th>Action</th>
		</tr>

<!-- php code for fetching data from database --> 
		<?php
			$sql = "select * from customers";
			$result = mysqli_query($con, $sql);
			
			while($customer = mysqli_fetch_assoc($result))
			{
				$customerid = $customer['customerid'];
				$sql2 = "select * from accounts where customerid = '$customerid'";
				$result2 = mysqli_query($con, $sql2);
				$account = mysqli_fetch_assoc($result2);
		
		?>
<!--displaying record in each row-->
				<tr align="center"> 
				<td> <?php echo $customer['customerid'];?></td>
<?php
				if ($account)
				{
?>
				<td> <?php echo "(", $account['bsbno'], ")  ",$account['accountno'] ;?></td>
<?php
				}
				elseif(!$account)
				{
?>
				<th> <?php echo "No account created" ;?></th>
<?php
				}
?>
				<td> <?php echo $customer['firstname'];?></td>
				<td> <?php echo $customer['lastname'];?></td>
				<td> <?php echo $customer['gender'];?></td>
				<td> <?php echo $customer['emailid'];?></td>
				<td> <?php echo $customer['phone'];?></td>
				<td> <?php echo $customer['address'];?></td>
				<td> <?php echo $customer['postcode'];?></td>

<!--links for edit.php and delete.php. CustomerID is passed using these links -->
				<td> <a href="edit.php?GetID=<?php echo $customer['customerid'];?>">Edit</a>
					 <a href="delete.php?GetCID=<?php echo $customer['customerid'];?>">Delete</a></td>
				</tr>
<?php
				
			}
}
else
{
	header("location:login.php?loginerror");
}
	
?>

	</table>
</body>
</html>