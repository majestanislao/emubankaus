<?php
session_start();
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
	$debitaccount = $_POST['debitaccount'];
	$amount = $_POST['amount'];
	$description = $_POST['description'];
	
	echo $debitbsb, "    ", $debitaccount, "    ", "    ", $description;
	
	
	if($amount>$balance)
	{
		$amounterror = "You do not have sufficient balance";
		alert($amounterror);
	}
	else
	{
		$query2 = "select *from accounts where bsbno = '$debitbsb' and accountno = '$debitaccount'";
		$checkaccount = mysqli_query($con, $query2);
		if (mysqli_num_rows($cehckaccount)>0)
		{
			while($debitbal = mysqli_fetch_assoc($checkaccount))
			{
				$debitbalance = $debitbal['balance'];
			}
				$debitaccountbal = $debitbalance + $amount;
				$creditaccountbal = $balance - $amount;
			
			$query3 = 	"INSERT INTO transactions (amount, description, , debitaccountno, debitaccountbal, creditaccountno, creditaccountbal) 
						VALUES ('{$amount}', '{$description}', , '{$debitaccountno}', '{$debitaccountbal}', '{$accountno}', '{$creditaccountbal}')";
			
			if (!mysqli_query($con,$query3))
// if database is not connected or query is not executed, display error				
			{
				$dberrormsg = "Error in connecting the database, please try again";
				alert($dberrormsg);
			}
			else
			{
				echo "success";
			}
		}
		else
		{
			$accounterrormsg = "The account number entered is invalid";
			alert($dberrormsg);
		}
		
		
	}
}
?>