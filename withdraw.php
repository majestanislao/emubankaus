<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/transfer.css" rel="stylesheet"/>
	<title>Withdraw Money</title>
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
    <div class="container3">
		<div style="text-align:center">
			<h2>Deposit Cash</h2>
		</div>
		<div class="row">
			<div class="column">
			<img src="Images/credit.jpg" style="width:100%">
			</div>
	
			<div class="column">
     <?php 
	 if (isset($accountno))
	 {
	 ?>
			<form name="withdrawform" action="withdraw.php?GetID=<?php echo $customerid;?>" method = "POST">
				 		
				<div class="inputfield">		
				<label>Select an account:</label><br>
				<input type="radio" id= "accountno" name="accountno" 
				required value="<?php echo $bsbno, " ", $accountno;?>" checked> Savings Account <?php echo $bsbno, " ", $accountno;?>
				</div>
				<br>
				
				<label for="amount">Amount</label><br>
				<input type="number" id="amount" name="amount" placeholder="Enter an amount e.g. 125.00" step=".01" required> <br>
					
				<label for="description">Description</label>
				<input type="text"  id="description" name="description" placeholder="Enter a Description e.g. Deposit" required>    

				<center><button type="Submit" class="withdrawbtn" name="withdrawbtn">Withdraw</button> </center>
			</form>
			</div>
		</div>
	</div>
    <?php
	 }
	 else
	 {
		echo "your accsount has not been created yet. Please contact Bank";
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
if (isset($_POST['withdrawbtn']))
{
	$amount = $_POST['amount'];
	$description = $_POST['description'];
	
	$creditaccountbal = $balance - $amount;
	$query3 = 	"INSERT INTO transactions (amount, description, creditaccountno, creditaccountbal) 
				VALUES ('$amount', '$description', '$accountno', '$creditaccountbal')";
	$query4 =  "UPDATE accounts SET balance = '{$creditaccountbal}' WHERE accountno = $accountno";
	
	if (!mysqli_query($con,$query3) || !mysqli_query($con,$query4))
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
?>
	
      	<br>
		<br>
		<center><h4>Connect with us</h4>
		<a href= "http://www.facebook.com"><img src="FONTAWSOME\facebook-square.svg" width="50"></a>
		<a href= "http://wwww.twitter.com"><img src="FONTAWSOME\twitter-square.svg" width="50"></a>
		<a href= "http://wwww.instagram.com"><img src="FONTAWSOME\instagram.svg" width="50"></a>
		<br>
		<br>
		&copy; Copyright 2020. All Rights Reserved.<br>
		<a href="mailto:emubankaustralia.com">emubankaustralia@gmail.com</a></center>
</form>
</body>
</html>