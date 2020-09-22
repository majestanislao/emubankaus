<!DOCTYPE html> 
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="view port" content="width=device-width, initial scale=1">
		<title>Customer Details</title>
		<link rel="stylesheet" href="./css/customerdetails.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php
				include 'header.php';
		?>	
</head>
<body>	
	<h1>Customer Details</h1>
	<table align="center" width="100%">
                  	<tr>
                    	<th>CustomerID</th>
                    	<th>First name</th>
                        <th>Last name</th>
						<th>Gender</th>
                        <th>Email ID</th>
						<th>Phone</th>
						<th>Address</th>
						<th>Post code</th>
						<th>Action</th>
                    </tr>
			<?php
			while($row = mysqli_fetch_assoc($sql))
			{
			?>
				<tr align="center"> 
				<td> <?php echo $row['customerid'];?></td>
				<td> <?php echo $row['firstname'];?></td>
				<td> <?php echo $row['lastname'];?></td>
				<td> <?php echo $row['gender'];?></td>
				<td> <?php echo $row['emailid'];?></td>
				<td> <?php echo $row['phone'];?></td>
				<td> <?php echo $row['address'];?></td>
				<td> <?php echo $row['postcode'];?></td>
				<td> <a href="edit.php?GetID=<?php echo $row['customerid'];?>">Edit</a>
					 <a href="delete.php?Del=<?php echo $row['customerid'];?>">Delete</a> </td>
					
				</tr>
			<?php
			}
			?>
	</table>
</body>
</html>