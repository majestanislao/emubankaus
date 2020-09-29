<?php
	include 'login.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMU Bank Austrlalia</title>
    <link type="text/css" href="./css/home.css" rel="stylesheet"/>
    <link rel="stylesheet" href="./css/style.css" rel="stylesheet"/>
    
</head>
<body>
    <header>
        <a href="index.php"><img class="logo" src="/Images/emu.png" alt="logo"></a>
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
    <main>
	<center>
	<h1>Quick Balance</h1><br>


<div class="container">
  <form action="/action_page.php">
    <label for="smartaccess">Smart Access:</label><br>
    
    <label for="abal">Account balance:</label>
    <input type="text" id="abal" name="accountbalance" ">

  
    </select>
  
  </form>
</div><br>

<div class="container">
  <form action="/action_page.php">
    <label for="netbank">Net Bank Saver:</label><br>
    
    <label for="abal">Account balance:</label><br>
    <input type="text" id="abal" name="accountbalance" ">
</div>
  
    </select><br>
	
	
        <section class="presentation">
            <div class="introduction">
                <div class="info-text">
                    <h1>Have your dream home</h1>
                    <p>Apply for a Emu Home Loan today to get our low interest rate and low-fee home loans.</p>
                </div>
                <div class="cta">
                    <button class="apply-inquire"> Inquire now</button>
                </div>
            </div>
            <div class="cover">
                <img src="/Images/home-loan.jpg" alt="HomePic">
            </div>

        </section>
        <section class="presentation1">
            <div class="cover1">
                <img src="/Images/credit.jpg" alt="credit">
            </div>
            <div class="introduction1">
                <div class="info-text1">
                    <h1>Credit cards</h1>
                    <p>Choose from our range of low rate, low fee and awards cards.</p>
                </div>
                <div class="cta1">
                    <button class="apply-inquire1"> Apply now</button>
                </div>
            </div>
			</section>
</main>
</body>
		
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
</html>
