<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/transfer.css" rel="stylesheet"/>
	<title>Transfer Money</title>
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
				$bsbno = $cbal['bsbno'];
				$accountno = $cbal['accountno'];
				$balance = $cbal['balance'];
			}
		}
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
// Creating a function "alert" in PHP
function alert($msg) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
	return false;
}
$con = mysqli_connect('localhost', 'root', '', 'emubank');

//when submit button is clicked
if (isset($_POST['transferbtn']))
{
	$debitbsb = $_POST['debitbsb'];
	$debitaccountno = $_POST['debitaccount'];
	$amount = $_POST['amount'];
	$description = $_POST['description'];
	
	if($amount>$balance)
	{
		$amounterror = "You do not have sufficient balance";
		alert($amounterror);
	}
	else
	{
		$query2 = "select *from accounts where bsbno = '$debitbsb' and accountno = '$debitaccountno'";
		$checkaccount = mysqli_query($con, $query2);
		if (mysqli_num_rows($checkaccount)>0)
		{
			while($debitbal = mysqli_fetch_assoc($checkaccount))
			{
				$debitbalance = $debitbal['balance'];
			}
				$debitaccountbal = $debitbalance + $amount;
				$creditaccountbal = $balance - $amount;
						
			$query3 = 	"INSERT INTO transactions (amount, description, debitaccountno, debitaccountbal, creditaccountno, creditaccountbal) 
						VALUES ('$amount', '$description', '$debitaccountno', '$debitaccountbal', $accountno, $creditaccountbal)";
			$query4 =  "UPDATE accounts SET balance = '{$debitaccountbal}' WHERE accountno = $debitaccountno";
			$query5 =  "UPDATE accounts SET balance = '{$creditaccountbal}' WHERE accountno = $accountno";
			
			if (!mysqli_query($con,$query3) || !mysqli_query($con,$query4) || !mysqli_query($con,$query5))
// if database is not connected or query is not executed, display error				
			{
				$dberrormsg = "Error in connecting the database, please try again";
				alert($dberrormsg);
			}
			else
			{
				$successmsg = "Transcation Successful";
				alert($successmsg);
			}
		}
		else
		{
			$accounterrormsg = "The account number entered is invalid";
			alert($accounterrormsg);
		}
		
	}
}
?>
	</div>
  </div>
</div>

</body>
<?php
	include 'footer.php';
?>
</html>
	
