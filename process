<?php
$ClientID = $POST['ClientID'];
$Password = $POST['Password'];

$ClientID = stripcslashes($ClientID);
$Password = stripcslashes('Password');
$ClientID = mysql_real_escape_string ($ClientID);
$Password = mysql_real_escape_string ($Password);

mysql_connect("localhost", "root", "");
mysql_select_db("login");

$result = mysql_query ("select = from users where ClientID = $ClientID and Password = $Password'")
 or die ("Fail query database ".mysql_error());
 
$row =mysql_query_fetch_array($result);
if ($row['ClientID'] == $ClientID) && $row ['$Password'] == $Password }{
echo "Welcome to Emubank Australia" .$row['$ClientID'];

	
} else {
	echo "Login Failed";
	
}
?>