<<<<<<< HEAD:transfer.php
<!DOCTYPE html>
<html>
 <head>
<title>Emu Bank of Australia</title>
<meta charset="utf-8">
<link rel="stylesheet" href="./css/styles.css" rel="stylesheet"/>
<style type="text/css">
    body, html {
        height: 100%;
      }
      
      * {
        box-sizing: border-box;
      }
      
      .bg-img {
        
        background-image: url("images/pict.jpg");
      
        
        min-height: 380px;
      
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
      }
      
     
      .container {
        position: absolute;
        right: 0;
        margin: 20px;
        max-width: 300px;
        padding: 16px;
        background-color: white;
      }
      
     
        input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
      }
      
      input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
      }
      
      /* Set a style for the submit button */
      .btn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
      }
      
      .btn:hover {
        opacity: 1;
      }
      </style>
</head>
<body>
    <header>
        <div class "emu">
    <a href="index.html"><img class="logo" src="/Images/emu.png" alt="logo"></a>
		</div>
		<nav>
              <ul class="nav-links">
                <li><a href="details.php">Account Details</a></li>
                <li><a href="transfer.php">Transfer Money</a></li>
                <li><a href="deposit.php">Deposit Cash</a></li>
				<li><a href="withdraw.php">Withdraw Cash</a></li>
                <li><a href="faqs.php">FAQs</a></li>
                <li><a class= "logout" href="logout.php"><button>Log Out</button></a></li>
			</ul>
           
        </nav>
    </header>
     <h3>Transfer funds</h3>
     <div class="bg-img">
        <form action="/action_page.php" class="container">
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
  </form>
</div>

	 
	  
</body>
</html>
	
  <h4>Connect with us</h4>
		<a href= "http://www.facebook.com"><img src="FONTAWSOME\facebook-square.svg" width="50"></a>
		<a href= "http://wwww.twitter.com"><img src="FONTAWSOME\twitter-square.svg" width="50"></a>
		<a href= "http://wwww.instagram.com"><img src="FONTAWSOME\instagram.svg" width="50"></a>
		<br>
		&copy; Copyright 2020. All Rights Reserved.<br>
		<a href="mailto:emubankaustralia.com">emubankaustralia@gmail.com</a>

</form>
</div>
</div>
</html>
=======
<!DOCTYPE html>
<html>
 <head>
<title>Emu Bank of Australia</title>
<meta charset="utf-8">
<link rel="stylesheet" href="./css/styles.css" rel="stylesheet"/>
<style type="text/css">
    body, html {
        height: 100%;
      }
      
      * {
        box-sizing: border-box;
      }
      
      .bg-img {
        
        background-image: url("images/pict.jpg");
      
        
        min-height: 380px;
      
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
      }
      
     
      .container {
        position: absolute;
        right: 0;
        margin: 20px;
        max-width: 300px;
        padding: 16px;
        background-color: white;
      }
      
     
        input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
      }
      
      input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
      }
      
      /* Set a style for the submit button */
      .btn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
      }
      
      .btn:hover {
        opacity: 1;
      }
      </style>
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
     <h3>Transfer funds</h3>
     <div class="bg-img">
        <form action="/action_page.php" class="container">
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
  </form>
</div>

	 
	  
</body>
</html>
	
  <h4>Connect with us</h4>
		<a href= "http://www.facebook.com"><img src="FONTAWSOME\facebook-square.svg" width="30"></a>
		<a href= "http://wwww.twitter.com"><img src="FONTAWSOME\twitter-square.svg" width="30"></a>
		<a href= "http://wwww.instagram.com"><img src="FONTAWSOME\instagram.svg" width="30"></a>
		<br>
		&copy; Copyright 2020. All Rights Reserved.<br>
		<a href="mailto:emubankaustralia.com">emubankaustralia@gmail.com</a>

</form>
</div>
</div>
</html>
>>>>>>> c67adb61a070ae0a9181035057cd23c2f826d9f2:transfer.html
