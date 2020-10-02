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
<?php
//if session variable is true i.e. user is logged in, following html code is executed to show heading & image
if(isset($_SESSION['loggedin']))
{
?>
    <div class="container3">
		<div style="text-align:center">
			<h2>Deposit Cash</h2>
		</div>
		<div class="row">
			<div class="column">
			<img src="Images/deposit.png" style="width:100%">
			</div>
	
			<div class="column">
     <?php 
//if customer has an account no then create the following deposit form
	 if (isset($accountno))
	 {
	 ?>
			<form name="depositform" action="deposit.php?GetID=<?php echo $customerid;?>" method = "POST">
				 		
				<div class="inputfield">		
				<label>Select an account:</label><br><br>
				<input type="radio" id= "accountno" name="accountno" 
				required value="<?php echo $bsbno, " ", $accountno;?>" checked> Savings Account <?php echo $bsbno, " ", $accountno;?>
				</div>
				<br>
				
				<label for="amount">Amount</label><br>
				<input type="number" id="amount" name="amount" placeholder="Enter an amount e.g. 125.00" step=".01" required> <br>
					
				<label for="description">Description</label><br>
				<input type="text"  id="description" name="description" placeholder="Enter a Description e.g. Deposit" required>    

				<center><button type="Submit" class="depositbtn" name="depositbtn">Deposit</button> </center>
			</form>
		
    <?php
	 }
//if customer doesn't have an account no then display the message.
	 else
	 {
		echo "<h4 align='center'>Your account has not been created yet. Please contact Bank Admin</h4>";
	 }
}
//if session variable is not true i.e. user is not logged in
else
{
//include the following file to showing login error message.
	include 'notloginmessage.php';
}
?>
		</div>
	</div>
</div>
<?php
// Creating a function "alert" in PHP
function alert($msg) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
	return false;
}
$con = mysqli_connect('localhost', 'root', '', 'emubank');

//when deposit button is clicked
if (isset($_POST['depositbtn']))
{
//assign the varaiables using the user input
	$amount = $_POST['amount'];
	$description = $_POST['description'];
//debit account description is created using the user input
	$debitaccountdesc = "Cash Deposit, Detail: ". $description;
//debit account balance is equal to current balance + amount deposit
	$debitaccountbal = $balance + $amount;
//query to insert the deposit transcation in the transcations table
	$query3 = 	"INSERT INTO transactions (amount, debitaccountdesc, debitaccountno, debitaccountbal) 
				VALUES ('$amount', '$debitaccountdesc', '$accountno', '$debitaccountbal')";
//query to update the balance of account with new balance
	$query4 =  "UPDATE accounts SET balance = '{$debitaccountbal}' WHERE accountno = $accountno";
	
	if (!mysqli_query($con,$query3) || !mysqli_query($con,$query4))
// if any of the queries are not executed or database is not connected, display error				
	{
		$dberrormsg = "Error in connecting the database, please try again";
		alert($dberrormsg);
	}
	else
//if both queries are executed, display the success message
	{
		$successmsg = "Transcation Successful";
		alert($successmsg);
	}
}
?>
<?php
	include 'footer.php';
?>
</body>
</html>