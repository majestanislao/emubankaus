<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./css/transfer.css" rel="stylesheet"/>
	<title>Deposit Money</title>
	<?php
		include 'header.php';
	?>
</head>
<body>

<div class="container3">
	<div style="text-align:center">
		<h2>Deposit Cash</h2>
	</div>
	<div class="row">
		<div class="column">
		<img src="Images/deposit.png" style="width:100%">
		</div>

	<div class="column">
	<form name="depositform" action="3rdpartydeposit.php" method = "POST">
		<div class="inputfield">		
		<label>To:</label><br>
			<input type="tel" id="debitbsb" name="debitbsb" placeholder="Enter 6-digit BSB number" pattern="[0-9]{6}" required> <br>
			<input type="tel" id="debitaccount" name="debitaccount" placeholder="Enter 8-digit account number" pattern="[0-9]{8}" required> <br>
		</div>
		<br>
		<label for="amount">Amount</label><br>
		<input type="number" id="amount" name="amount" placeholder="Enter an amount e.g. 125.00" step=".01" required> <br>
		<label for="description">Deposit by</label><br>
		<input type="text"  id="depositby" name="depositby" placeholder="Enter your or company Name" required><br>
		<label for="description">Description</label><br>
		<input type="text"  id="description" name="description" placeholder="Enter a Description e.g. Deposit" required>    

		<center><button type="Submit" class="depositbtn" name="depositbtn">Deposit</button> </center>
	</form>
	</div>
</div>
</div>
</body>
<?php
// Creating a function "alert" in PHP
function alert($msg) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
	return false;
}
$con = mysqli_connect('localhost', 'root', '', 'emubank');

//when transfer button is clicked
if (isset($_POST['depositbtn']))
{
//assign the varaiables using the user input
	$debitbsb = $_POST['debitbsb'];
	$debitaccountno = $_POST['debitaccount'];
	$depositby = $_POST['depositby'];
	$amount = $_POST['amount'];
	$description = $_POST['description'];

//query to select the account in which customer want to transfer the money into 
	$query2 = "select *from accounts where bsbno = '$debitbsb' and accountno = '$debitaccountno'";
	$checkaccount = mysqli_query($con, $query2);
//if account is found in which customer is trying to transfer the money
	if (mysqli_num_rows($checkaccount)>0)
	{
//get the balance of the account in which we are transferring the money
		while($debitbal = mysqli_fetch_assoc($checkaccount))
		{
			$debitbalance = $debitbal['balance'];
		}
//add the transfer amount to the balance of the account in which we are transferring money and assign it to debit account bal 
			$debitaccountbal = $debitbalance + $amount;
//debit account description is created using the user input
			$debitaccountdesc = "Transfer by ". $depositby. " Detail: ". $description;
//query to insert the transcation data into transcations table										
			$query3 = 	"INSERT INTO transactions (amount, debitaccountdesc, debitaccountno, debitaccountbal)
						VALUES ('$amount', '$debitaccountdesc', '$debitaccountno', '$debitaccountbal')";
//query to update the balance of the account in which customer is transfering the money	
			$query4 =  "UPDATE accounts SET balance = '{$debitaccountbal}' WHERE accountno = $debitaccountno";
			if (!mysqli_query($con,$query3) || !mysqli_query($con,$query4))
// if any of the query failed or database connection failed then display error message			
			{
				$dberrormsg = "Error in connecting the database, please try again";
				alert($dberrormsg);
			}
//if all querues are executed then display the success message
			else
			{
				$successmsg = "Transcation Successful";
				alert($successmsg);
			}
		}
//if account is not found in which customer is trying to transfer the money, then show error
	else
	{
		$accounterrormsg = "The bsb number and/or account number entered is invalid";
		alert($accounterrormsg);
	}
}
?>

</body>
<?php
	include 'footer.php';
?>
</html>