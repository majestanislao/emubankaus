<html>
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css" href="./css/header.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>

        <div class "emu">
<!--When clicked on logo redirect to home page -->
			<a href="index.php"><img class="logo" src="Images/emu.png" alt="logo"></a>
		</div>
<!-- Navigation links -->
			<nav>
				<ul class="nav-links">			
					<li><a href="details.php">Account Details</a></li>
					<li><a href="transfer.php">Transfer Money</a></li>
					<li><a href="deposit.php">Deposit Cash</a></li>
					<li><a href="withdraw.php">Withdraw Cash</a></li>
					<li><a href="transactions.php">Transactions</a></li>
					<li><a href="faqs.php">FAQs</a></li>
<?php
// if user is login in the session then the following code is exceduted
				if(isset($_SESSION['loggedin']))
				{
// customer ID variable created for ease
					$customerid = $_SESSION['customerid'];
// Database connection 
					$con = mysqli_connect('localhost', 'root', '', 'emubank');
// From the database Select the customer whose customerid is equal to customer id used in login  
					$sql = "select *from customers where customerid = '".$customerid."'";
					$result = mysqli_query($con,$sql);
// From the database Select the account whose customerid is equal to customer id used in login  
					$query = "select *from accounts where customerid = '".$customerid."'";
					$result1 = mysqli_query($con, $query);
// if the account exist of loggedin customer fetch the data. Following data is used in other pages. 
					if ($result1)
					{
					while($account = mysqli_fetch_assoc($result1))
						{
							$bsbno = $account['bsbno'];
							$accountno = $account['accountno'];
							$balance = $account['balance'];
							$openingbal = $account['openingbal'];
						}
					}
?>
<!-- if user logged in, Log out link created with logout parameter in URL -->				
				<li><a class= "logout" href="logout.php?logout">Log Out</a></li>
<?php
				}
// if user not logged in, Log in link created  
				else
				{
?>
				<li><a class= "login" href="login.php">Log In</a></li>
<?php
				}
?>					
					
				</ul>
			</nav>
</header>
</body>
</html>