<?php
//following code is only executed, when user clicked on logout link from header as it given the logout parameter in the URL 
if (isset($_REQUEST['logout'])) 
	{
//session start to get all the session varaibel
		session_start();
//session destroy to null all the session varaibles
        session_destroy();
//redirect to logout.php without any 'logout' parameter in URL to show the below message in HTML code
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