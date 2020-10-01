<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/transactions.css" rel="stylesheet"/>
	<title>Transaction History</title>
	<?php
		include 'header.php';
	?>
</head>
<body>
<?php
if(isset($_SESSION['validate']))
{
	$query = "select *from accounts where customerid = '".$customerid."'";
	$result1 = mysqli_query($con, $query);
		if ($result1)
		{
			while($cbal = mysqli_fetch_assoc($result1))
			{
				$accountno = $cbal['accountno'];
				$balance = $cbal['balance'];
			}
		}
?>
<?php 
	 if (isset($accountno))
	 {
		$query2 = "select * from transactions where debitaccountno = '$accountno' or creditaccountno = '$accountno'" ;
		$result2 = mysqli_query($con, $query2);
		if (mysqli_num_rows($result2) != 0) 
		{
?>
			<div class="container2">
			<div style="text-align:center">
					<h2>Transaction History</h2>
			</div>
			<br>
			<table id="transactions">
				<tr align="center">
					<th>Date</th>
					<th>Transaction Details</th>
					<th>Credit</th>
					<th>Debit</th>
					<th>Balance</th>
				</tr>
				<tr align="center">
					<td> </th>
					<td>Initial Balance</th>
					<td> </th>
					<td> </th>
					<td>$100.00</th>
				</tr>
<?php	
			while($tran = mysqli_fetch_assoc($result2))
			{
				if ($accountno == $tran['debitaccountno'])
				{
?>
				
<!--displaying record in each row-->
			
				<tr align="center"> 
				<td> <?php echo $tran['date'];?></td>
				<td> <?php echo $tran['description'];?></td>
				<td> </td>
				<td> <?php echo "$", $tran['amount'];?></td>
				<td> <?php echo "$", $tran['debitaccountbal'];?></td>
				</tr>

<?php	
				}
				elseif ($accountno == $tran['creditaccountno'])
				{
?>
				
<!--displaying record in each row-->
			
				<tr align="center"> 
				<td> <?php echo $tran['date'];?></td>
				<td> <?php echo $tran['description'];?></td>
				<td> <?php echo "$", $tran['amount'];?></td>
				<td> </td>
				<td> <?php echo "$", $tran['creditaccountbal'];?></td>
				</tr>
			
<?php		
				}
				
			}
?>		
			<tr align="center">
					<td> </th>
					<td>Closing Balance</th>
					<td> </th>
					<td> </th>
					<td><?php echo "$", $balance;?></th>
				</tr>
			</table>;
<?php
		}
?>
		
<?php
	}
	else
	 {
		echo "your account has not been created yet. Please contact Bank";
	 }
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