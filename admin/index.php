<?php
session_start();
//checking if success variable is passed in the URL
if (isset($_REQUEST['success'])) 
	{
// Prompt if the data is successfully updated in the database display the success message.
		$successmsg = "Customer Data is sucessfully updated";
		echo "<script type='text/javascript'>alert('$successmsg');</script>";
	}
//checking if add customer variable is passed in the URL
if (isset($_REQUEST['addcustomer'])) 
	{
// Pop up message when customer is added by the admin
		$addcustomermsg = "New Customer is successfully added";
		echo "<script type='text/javascript'>alert('$addcustomermsg');</script>";
	}
//checking if delete variable is passed in the URL
if (isset($_REQUEST['delete'])) 
	{
// Prompt if the selected data is successfully deleted by the admin
		$deletemsg = "Selected Customer is deleted";
		echo "<script type='text/javascript'>alert('$deletemsg');</script>";
	}
//checking if add account variable is passed in the URL
if (isset($_REQUEST['addaccount'])) 
	{
// Prompt if the admin has created customer account 
		$addaccountmsg = "Customer Account Details has been Created";
		echo "<script type='text/javascript'>alert('$addaccountmsg');</script>";
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
//if session variable is true i.e. admin is logged in
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
//while loop started to fetch all customer data from customer table
			while($customer = mysqli_fetch_assoc($result))
			{
//assign fetched customerid of a specific record to the customerid varaible	
				$customerid = $customer['customerid'];
//query to select the account data from accounts table of specific customer id assigned in previous step.
				$sql2 = "select * from accounts where customerid = '$customerid'";
				$result2 = mysqli_query($con, $sql2);
//varaible to store fetched account data
				$account = mysqli_fetch_assoc($result2);
		
		?>
<!--displaying record in each row-->
				<tr align="center"> 
				<td> <?php echo $customer['customerid'];?></td>
<?php
//if any account data fetched for specific customer id, display it in the customer detail table on index page.
				if ($account)
				{
?>
				<td> <?php echo "(", $account['bsbno'], ")  ",$account['accountno'] ;?></td>
<?php
				}
//if no account data fetched for specific customer id, display it no account created.
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
// if session variable turns false that means cannot perform any operations on customers data 
// and redirect admin to login page with loginerror varaible in URL 
else
{
	header("location:login.php?loginerror");
}
	
?>

	</table>
</body>
</html>