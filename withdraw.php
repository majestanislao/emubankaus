<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/withdraw.css" rel="stylesheet"/>
	<title>Withdraw Cash</title>
	
</head>
<body>
    <header>
        <div class "emu">
		<a href="index.html"><img class="logo" src="Images/emu.png" alt="logo"></a>
		</div>
		<nav>
            <ul class="nav-links">
                <li><a href="details.html">Account Details</a></li>
                <li><a href="transfer.html">Transfer Money</a></li>
                <li><a href="deposit.html">Deposit Cash</a></li>
				<li><a href="withdraw.html">Withdraw Cash</a></li>
				<li><a href="transactions.html">Transactions</a></li>
                <li><a href="faqs.html">FAQs</a></li>
				<li><a class= "logout" href="logout.html">Log Out</a></li>
			</ul>
        </nav>
    </header>
	
	<div class="container">
	<div style="text-align:center">
		<h2>Withraw Cash</h2>
	</div>
	<div class="row">
    <div class="column">
    <img src="Images/credit.jpg" style="width:100%">
    </div>
	
    <div class="column">
      <form action="/action_page.php">
      
        <label for="From">Withraw Cash to</label>
        <select id="From" name="From">
        <option value="select">Select an account : </option>
		<option value="daily">Daily Savings 012345</option>
		<option value="Growth">GrowthSavings 3122345</option>
        </select>
      
		<label for="amount">Amount</label>
		<input type="text" placeholder="Enter Amount" id="amount" name="amount" required>
			
		<label for="desc">Description</label>
		<input type="text"  id="desc" name="desc" placeholder="Optional">    

        <input type="Withdraw" value="Withdraw">
		<input type="Cancel" value="Cancel">
      </form>
    </div>
  </div>
</div>
	
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
	 
	  
</body>
</html>
	
