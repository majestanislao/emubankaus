<?php
if (isset($_REQUEST['logout'])) 
	{
		session_start();
        session_destroy();
		header("location:logout.php");
	}
?>

<!DOCTYPE html>


<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta name="view port" content="width=device-width, initial scale=1">
		<title>logged out</title>	
		<link type="text/css" href="./css/login.css" rel="stylesheet"/>
		<?php
		{	
			include 'header.php';
		}
		?>	
	</head>
<body>
	<div class="form">
	<h2>Thank you for doing business with Emubank Australia! You are successfully logged out.</h2>
	<br>
<main>
	<h1> Login to Internet Banking? <a href="login.php"> Click here </a></h1>
	</div>
<?php
	include 'footer.php';
?>
</body>
</html>