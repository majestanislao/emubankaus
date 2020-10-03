<?php
//session start to get all the session varaibel
		session_start();
//session destroy to null all the session varaibles
        session_destroy();
//redirect to logout.php without any 'logout' parameter in URL to show the below message in HTML code
		header("location:login.php?logout");
?>

