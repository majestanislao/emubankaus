<<<<<<< HEAD:deposit.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit/Withrawal</title>
	<link type="text/css" href="./css/deposit.css" rel="stylesheet"/>
	<link rel="stylesheet" href="./css/styles.css" rel="stylesheet"/>
</head>
<body>
    <header>
        <div class "emu">
		<a href="index.html"><img class="logo" src="/Images/emu.png" alt="logo"></a>
		</div>
		<nav>
             <ul class="nav-links">
                <li><a href="details.html">Account Details</a></li>
                <li><a href="transfer.html">Transfer Money</a></li>
                <li><a href="deposit.html">Deposit Cash</a></li>
				<li><a href="withdraw.html">Withdraw Cash</a></li>
                <li><a href="faqs.html">FAQs</a></li>
				<li><a class= "logout" href="logout.html"><button>Log Out</button></a></li>
            </ul>
        </nav>
    </header>
		<form action="/action_page.php" class="container">
        <h3>Deposit</h3>
	
		<center><select id="from" name="from">
    	<option value="select">Select an account : </option>
     	<option value="daily">Daily Savings 012345</option>
      	<option value="Growth">GrowthSavings 3122345</option>
		</select>

		<label for="amount">Amount</label>
		<input type="text" placeholder="Enter Amount" id="amount" name="amount" required>
        
		<label for="desc">Description</label>
		<input type="text"  id="desc" name="desc" placeholder="Optional">

		<input type="Deposit" value="Deposit">
		<input type="Cancel" value="Cancel">
	

		<h4>Connect with us</h4>
		<a href= "http://www.facebook.com"><img src="FONTAWSOME\facebook-square.svg" width="50"></a>
		<a href= "http://wwww.twitter.com"><img src="FONTAWSOME\twitter-square.svg" width="50"></a>
		<a href= "http://wwww.instagram.com"><img src="FONTAWSOME\instagram.svg" width="50"></a>
		<br>
		&copy; Copyright 2020. All Rights Reserved.<br>
		<a href="mailto:emubankaustralia.com">emubankaustralia@gmail.com</a></center>
 
</form>
</body>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit/Withrawal</title>
	<link type="text/css" href="./css/deposit.css" rel="stylesheet"/>
	<link rel="stylesheet" href="./css/styles.css" rel="stylesheet"/>
</head>
<body>
    <header>
        <div class "emu">
		<a href="index.html"><img class="logo" src="/Images/emu.png" alt="logo"></a>
		</div>
		<nav>
             <ul class="nav-links">
                <li><a href="details.html">Account Details</a></li>
                <li><a href="transfer.html">Transfer Money</a></li>
                <li><a href="deposit.html">Deposit Cash</a></li>
				<li><a href="withdraw.html">Withdraw Cash</a></li>
				<li><a href="cardsettings.html">Card Settings</a></li>
                <li><a href="faqs.html">FAQs</a></li>
				<li><a class= "logout" href="logout.html"><button>Log Out</button></a></li>
            </ul>
        </nav>
    </header>
		<form action="/action_page.php" class="container">
        <h3>Deposit</h3>
	
		<center><select id="from" name="from">
    	<option value="select">Select an account : </option>
     	<option value="daily">Daily Savings 012345</option>
      	<option value="Growth">GrowthSavings 3122345</option>
		</select>

		<label for="amount">Amount</label>
		<input type="text" placeholder="Enter Amount" id="amount" name="amount" required>
        
		<label for="desc">Description</label>
		<input type="text"  id="desc" name="desc" placeholder="Optional">

		<input type="Deposit" value="Deposit">
		<input type="Cancel" value="Cancel">
	

		<h4>Connect with us</h4>
		<a href= "http://www.facebook.com"><img src="FONTAWSOME\facebook-square.svg" width="30"></a>
		<a href= "http://wwww.twitter.com"><img src="FONTAWSOME\twitter-square.svg" width="30"></a>
		<a href= "http://wwww.instagram.com"><img src="FONTAWSOME\instagram.svg" width="30"></a>
		<br>
		&copy; Copyright 2020. All Rights Reserved.<br>
		<a href="mailto:emubankaustralia.com">emubankaustralia@gmail.com</a></center>
 
</form>
</body>
>>>>>>> c67adb61a070ae0a9181035057cd23c2f826d9f2:deposit.html
</html>