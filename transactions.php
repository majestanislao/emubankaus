<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./css/transactions.css" rel="stylesheet"/>
	<title>Transaction History</title>
	<?php
		include 'header.php';
	?>
</head>
<body>
<?php
//if session variable is true i.e. user is logged in.
if(isset($_SESSION['loggedin']))
{
?>
<div class="container2">
	<table id="transactions">
<?php
//if customer has an account no then run the following
	if (isset($accountno))
	{
?>
		<div style="text-align:center">
				<h2>Transaction History</h2>
		</div>
		<br>
			<tr align="center">
				<th>Date</th>
				<th>Transaction Details</th>
				<th>Credit</th>
				<th>Debit</th>
				<th>Balance</th>
			</tr>
			<tr align="center">
				<td> </td>
				<td>Opening Balance</td>
				<td> </td>
				<td> </td>
				<td><?php echo "$", $openingbal;?></td>
			</tr>
	
<?php
//query to select the records where customer accountno is either in debitaccountno or creditaccountno 
		$query2 = "select * from transactions where debitaccountno = '$accountno' or creditaccountno = '$accountno'" ;
		$result2 = mysqli_query($con, $query2);
//if our query return any record. 
		if (mysqli_num_rows($result2) != 0) 
		{
//fetch the data if query returns any rows
		while($tran = mysqli_fetch_assoc($result2))
			{
//if customer account is found in debitaccountno
				if ($accountno == $tran['debitaccountno'])
				{
?>				
<!--displaying the transcation amount in deposit and leave the credit amount empty with other fields-->
				
					<tr align="center"> 
					<td> <?php echo $tran['date'];?></td>
					<td> <?php echo $tran['debitaccountdesc'];?></td>
					<td> </td>
					<td> <?php echo "$", $tran['amount'];?></td>
					<td> <?php echo "$", $tran['debitaccountbal'];?></td>
					</tr>
<?php	
				}
//if customer account is found in creditccountno
				elseif ($accountno == $tran['creditaccountno'])
				{
?>
<!--displaying the transcation amount in credit and leave the debit amount empty with other fields-->
					<tr align="center"> 
					<td> <?php echo $tran['date'];?></td>
					<td> <?php echo $tran['creditaccountdesc'];?></td>
					<td> <?php echo "$", $tran['amount'];?></td>
					<td> </td>
					<td> <?php echo "$", $tran['creditaccountbal'];?></td>
					</tr>
<?php		
				}
			}
?>
<!--displaying the closing balance only if there are any transcations-->	
				<tr align="center">
					<td> </td>
					<td>Closing Balance</td>
					<td> </td>
					<td> </td>
					<td><?php echo "$", $balance;?></td>
				</tr>
<?php
		}
	}
//if customer doesn't have an account no then display the message.
	else
	 {
		echo "<br>";
		echo "<h4 align='center'>Your account has not been created yet. Please contact Bank Admin</h4>";
		echo "<br>";
	 }
?>
</table>
<?php
}
//if session variable is not true i.e. user is not logged in
else
{
//include the following file to showing login error message.
	include 'notloginmessage.php';
}	
?>	
<?php
	include 'footer.php';
?>
</body>
</html>