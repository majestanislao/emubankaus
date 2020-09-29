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
	<div class="container">
	<div style="text-align:center">
		<h2>Transfer Money</h2>
	</div>
	<div class="row">
    <div class="column">
    <img src="Images/transfer.jpg" style="width:100%">
    </div>
	
    <div class="column">
      <form action="/action_page.php">
      
        <label for="From">From</label>
        <select id="From" name="From">
        <option value="select">Select an account : </option>
		<option value="daily">Daily Savings 012345</option>
        </select>
        
        <label for="to">To</label>
		<input type="text" placeholder="Select a destination" id="to" name="to" required>
      
		<label for="amount">Amount</label>
		<input type="text" placeholder="Enter Amount" id="amount" name="amount" required>
			
		<label for="desc">Description</label>
		<input type="text"  id="desc" name="desc" placeholder="Optional">    

        <input type="Submit" value="Submit">
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
	
