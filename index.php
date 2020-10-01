<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
		include 'header.php';
	?>
	<link type="text/css" href="./css/style.css" rel="stylesheet"/>
    <title>EMU Bank Austrlalia</title>
</head>
<body>

	<?php
		if(isset($_SESSION['validate']))
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$firstname = $row['firstname'];
				$lastname = $row['lastname'];
			}
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
				if (isset($bsbno))
				{
				?>
				<h2> Welcome <?php echo $firstname, " ", $lastname;?> </h2><br>
				<h3> Current Balance </h3><br>
				<table width="110%">
					<thead align="center">
						<tr>
							<td>BSB</td>
							<td>ACCOUNT NUMBER</td>
							<td>ACCOUNT BALANCE</td>
						</tr>
						<tr>
							<td><?php echo $bsbno;?></td>
							<td><?php echo $accountno;?></td>
							<td><?php echo "$ ", $balance;?></td>
						</tr>
					</thead>
				</table>
			<?php
				}
				else
				{
					echo "your account has not been created yet. Please contact Bank";
				}
			}
			?>
			<h2> Welcome <?php echo $firstname, " ", $lastname;?> </h2><br>
					
			
	<?php
		}
	?>

    <main>
	
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
                <img src="./Images/loan.jpg" alt="homeloan">
            </div>

        </section>
        <section class="presentation1">
            <div class="cover1">
                <img src="./Images/credit.jpg" alt="credit">
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