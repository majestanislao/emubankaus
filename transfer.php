<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./css/transfer.css" rel="stylesheet"/>
	<title>Transfer Money</title>
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
	<div class="container1">
		<div style="text-align:center">
			<h2>Transfer Money</h2>
		</div>
	<div class="row">
    <div class="column">
    <img src="Images/transfer.jpg" style="width:100%">
    </div>
	
    <div class="column">
     <?php 
//if customer has an account no then create the following deposit form
	 if (isset($accountno))
	 {
	 ?>
		<form name="transferform" action="transfer.php?GetID=<?php echo $customerid;?>" method = "POST">
			 <div class="inputfield">		
				<label>Select an account:</label><br><br>
				<input type="radio" id= "accountno" name="accountno" 
				required value="<?php echo $bsbno, " ", $accountno;?>" checked> Savings Account <?php echo $bsbno, " ", $accountno;?>
			</div>
			<br>
			
			<label for="to">To</label><br>
			<input type="tel" id="debitbsb" name="debitbsb" placeholder="Enter 6-digit BSB number" pattern="[0-9]{6}" required> <br>
			<input type="tel" id="debitaccount" name="debitaccount" placeholder="Enter 8-digit account number" pattern="[0-9]{8}" required> <br>
		  
			<label for="amount">Amount</label><br>
			<input type="number" id="amount" name="amount" placeholder="Enter an amount e.g. 125.00" step=".01" required> <br>
				
			<label for="description">Description</label><br>
			<input type="text"  id="description" name="description" placeholder="Enter a Description" required>    

			<center><button type="Submit" class="transferbtn" name="transferbtn">Transfer</button> </center>
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

//when transfer button is clicked
if (isset($_POST['transferbtn']))
{
//assign the varaiables using the user input
	$debitbsb = $_POST['debitbsb'];
	$debitaccountno = $_POST['debitaccount'];
	$amount = $_POST['amount'];
	$description = $_POST['description'];
//if transfer amount is greater than balance	
	if($amount>$balance)
	{
//display error that insufficient funds
		$amounterror = "You do not have sufficient balance";
		alert($amounterror);
	}
//if transfer amount is lesser than or equal to balance
	else
	{
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
				$debitaccountdesc = "Transfer from ". $accountno. " Detail: ". $description;
//amount transfer is subtracted from current balance of loggedin customer account and assign to credit account balance
				$creditaccountbal = $balance - $amount;
//credit account description is created using the user input
				$creditaccountdesc = "Transfer to ". $debitaccountno. " Detail: ". $description;
//query to insert the transcation data into transcations table										
			$query3 = 	"INSERT INTO transactions (amount, debitaccountdesc, creditaccountdesc, debitaccountno, debitaccountbal, creditaccountno, creditaccountbal)
						VALUES ('$amount', '$debitaccountdesc', '$creditaccountdesc', '$debitaccountno', '$debitaccountbal', '$accountno', '$creditaccountbal')";
//query to update the balance of the account in which customer is transfering the money	
			$query4 =  "UPDATE accounts SET balance = '{$debitaccountbal}' WHERE accountno = $debitaccountno";
//query to update the balance of the account of the customer
			$query5 =  "UPDATE accounts SET balance = '{$creditaccountbal}' WHERE accountno = $accountno";
			if (!mysqli_query($con,$query3) || !mysqli_query($con,$query4) || !mysqli_query($con,$query5))
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
}
?>

</body>
<?php
	include 'footer.php';
?>
</html>
	
