<html>
<head>
<title> Header</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./css/home.css" rel="stylesheet"/>
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
                
				<?php
// Three conditions checked. 
// 1) Get paratmeter is not empty in URL, 
// 2) loggedin varaiable is true i.e user is logged in, 
// 3) Get parameter is same as customer id used while logging in
				if(!empty($_GET) && isset($_SESSION['loggedin']) && $_SESSION['customerid'] == $_GET['GetID'])
				{
					$customerid = $_GET['GetID'];
// Database connection 
					$con = mysqli_connect('localhost', 'root', '', 'emubank');
// From the database Select the customer whose customerid is equal to customer id used in login  
					$sql = "select *from customers where customerid = '".$customerid."'";
					$result = mysqli_query($con,$sql);
// creating a new session varaiable "validate", and we will use this varaible in other pages to display specific data of the selected customer.  
					$_SESSION['validate']='1'
				?>
<!-- Log out link is created if user login conditions are true -->
					<li><a href="details.php?GetID=<?php echo $customerid;?>">Account Details</a></li>
					<li><a href="transfer.php?GetID=<?php echo $customerid;?>">Transfer Money</a></li>
					<li><a href="deposit.php?GetID=<?php echo $customerid;?>">Deposit Cash</a></li>
					<li><a href="withdraw.php?GetID=<?php echo $customerid;?>">Withdraw Cash</a></li>
					<li><a href="transactions.php?GetID=<?php echo $customerid;?>">Transactions</a></li>
					<li><a href="faqs.php">FAQs</a></li>
					<li><a class= "logout" href="logout.php">Log Out</a></li>
				<?php
				}
				else
				{
// Nulling the value of the session varaible. 
					$_SESSION['validate']=NULL;
				?>
<!-- Log in link is created if any of the user login conditions are false -->
				<li><a href="details.php">Account Details</a></li>
                <li><a href="transfer.php">Transfer Money</a></li>
                <li><a href="deposit.php">Deposit Cash</a></li>
				<li><a href="withdraw.php">Withdraw Cash</a></li>
				<li><a href="transactions.php">Transactions</a></li>
                <li><a href="faqs.php">FAQs</a></li>
				<li><a class= "login" href="login.php">Log In</a></li>
				</header>
				<?php
				}
				?>
			</ul>
        </nav>
    </header>
</body>
</html>