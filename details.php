<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>EMU Bank Austrlalia</title>
<link type="text/css" href="./css/details.css" rel="stylesheet"/>
    <?php
		include 'header.php';
	?>
</head>
 
<body>
<div class="bg-img">
<?php
if(isset($_SESSION['validate']))
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$firstname = $row['firstname'];
				$lastname = $row['lastname'];
				$gender = $row['gender'];
				$emailid = $row['emailid'];
				$phone = $row['phone'];
				$address = $row['address'];
				$postcode = $row['postcode'];
			}
			$query = "select *from accounts where customerid = '".$customerid."'";
			$result1 = mysqli_query($con, $query);
			if ($result1)
			{
				
				while($cbal = mysqli_fetch_assoc($result1))
				{
					$bsbno = $cbal['bsbno'];
					$accountno = $cbal['accountno'];
					$balance = $cbal['balance'];
				}
				if (isset($bsbno))
				{
				?>
				<h2> Welcome <?php echo $firstname, " ", $lastname;?> </h2><br>
				<h2>Account Details</h2> <br>
				<table width="110%">
					<thead align="center">
						<tr>
							<th>BSB</th>
							<th>ACCOUNT NUMBER</th>
							<th>ACCOUNT BALANCE</th>
						</tr>
						<tr>
							<td><?php echo $bsbno;?></td>
							<td><?php echo $accountno;?></td>
							<td><?php echo "$ ", $balance;?></td>
						</tr>
					</thead>
				</table>
			<?php
				}
				else
				{
					echo "your account has not been created yet. Please contact Bank";
				}
			}
			?> 
<br>
<h2> Personal Details </h2>
<!--creating table headings for customer details -->
<table class="table" width="100%">
	<thead align = "left">
		<tr>
			<th>CustomerID:</th>
			<td> <?php echo $customerid;?></td>
		</tr>
		<tr>
			<th>First name:</th>
			<td> <?php echo $firstname;?></td>
		</tr>
		<tr>
			<th>Last name:</th>
			<td> <?php echo $lastname;?></td>
		</tr>
		<tr>	
			<th>Gender:</th>
			<td> <?php echo $gender;?></td>
		</tr>
		<tr>
			<th>Email ID:</th>
			<td> <?php echo $emailid;?></td>
		</tr>
		<tr>
			<th>Phone:</th>
			<td> <?php echo $phone;?></td>
		</tr>
		<tr>
			<th>Address:</th>
			<td> <?php echo $address;?></td>
		</tr>
		<tr>
			<th>Post code:</th>
			<td> <?php echo $postcode;?></td>
		</tr>
				
</thead>
			
<!--displaying customer data -->
		
				
	</table>
<?php
}
else
{
	echo "Please log in to access your details";
}
?>
<?php
	include 'footer.php';
?>
</body>			
</html>
	
	