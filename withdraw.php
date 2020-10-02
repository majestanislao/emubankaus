<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./css/transfer.css" rel="stylesheet"/>
	<title>Withdraw Money</title>
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
			<h2>Withdraw Cash</h2>
		</div>
		<div class="row">
			<div class="column">
			<img src="Images/credit.jpg" style="width:100%">
			</div>
	
			<div class="column">
     <?php
//if customer has an account no then create the following withdraw form
	 if (isset($accountno))
	 {
	 ?>
			<form name="withdrawform" action="withdraw.php?GetID=<?php echo $customerid;?>" method = "POST">
				 		
				<div class="inputfield">		
				<label>Select an account:</label><br><br>
				<input type="radio" id= "accountno" name="accountno" 
				required value="<?php echo $bsbno, " ", $accountno;?>" checked> Savings Account <?php echo $bsbno, " ", $accountno;?>
				</div>
				<br>
				
				<label for="amount">Amount</label><br>
				<input type="number" id="amount" name="amount" placeholder="Enter an amount e.g. 125.00" step=".01" required> <br>
					
				<label for="description">Description</label><br>
				<input type="text"  id="description" name="description" placeholder="Enter a Description e.g. Withdraw" required>    

				<center><button type="Submit" class="withdrawbtn" name="withdrawbtn">Withdraw</button> </center>
			</form>
	<?php
	 }
//if customer doesn't have an account no then display the message
	 else
	 {
		echo "<h4 align='center'>Your account has not been created yet. Please contact Bank Admin</h4>";
	 }
}
//if session variable is not true i.e. user is not logged in
else
{
//include the following file to showing login error message.
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

//when withdraw button is clicked
if (isset($_POST['withdrawbtn']))
{
//assign the varaiables using the user input
	$amount = $_POST['amount'];
	$description = $_POST['description'];
//credit account description is created using the user input
	$creditaccountdesc = "Cash Withdraw, Detail: ". $description;
//if withdraw amount is greater than balance
	if($amount>$balance)
	{
//display error that insufficient funds
		$amounterror = "You do not have sufficient balance";
		alert($amounterror);
	}
//if withdraw amount is lesser than or equal to balance
	else
	{
//amount withdraw is subtracted from current balance and assign to credit account balance
	$creditaccountbal = $balance - $amount;
//query to insert the withdraw transcation in the transcations table	
	$query3 = 	"INSERT INTO transactions (amount, creditaccountdesc, creditaccountno, creditaccountbal) 
				VALUES ('$amount', '$creditaccountdesc', '$accountno', '$creditaccountbal')";
//query to update the balance of account with new balance
	$query4 =  "UPDATE accounts SET balance = '{$creditaccountbal}' WHERE accountno = $accountno";
	
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
}
?>
</form>
<?php
	include 'footer.php';
?>
</body>
</html>
