
<!DOCTYPE html>
<html>
<head>
	<title>Emu Bank of Australia</title>
	<meta charset="utf-8">
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

        <center><form action="/action_page.php" class="container">
          <h1>Transfer Funds</h1>
          <label for="from"></b>From</label</b></label>
		<select id="from" name="from">
    	<option value="select">Select an account : </option>
     	<option value="daily">Daily Savings 012345</option>
      	<option value="Growth">GrowthSavings 3122345</option>
		</select>
    
    <label for="to">To</label>
    <input type="text" placeholder="select a destination" id="to" name="to" required>
      
    <label for="amount">Amount</label>
    <input type="text" placeholder="Enter Amount" id="amount" name="amount" required>
        
    <label for="desc">Description</label>
    <input type="text"  id="desc" name="desc" placeholder="Optional">

    <input type="submit" value="Submit">
	</form></center>
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
	
