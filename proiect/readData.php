<?php
include('ajax2.js');
$servername = "localhost";
$username = "root";

$dbname = "users";



// Create connection
$mysqli = new mysqli("localhost", $username, "", $dbname);

$email=$_POST['email'];
$pass=$_POST['psw'];


$checkEmail="SELECT Email, Password FROM users WHERE email='$email' and Password='$pass'";
$checkEmail_run=mysqli_query($mysqli,$checkEmail);
$my=mysqli_fetch_array($checkEmail_run);
 
if($my['Email']==$email && $my['Password']==$pass){
	$w=$my['Email'];
	
	echo '<script type="text/javascript">location.href="Untitled-1.php?xy=' ;
	echo $w;
	echo '"';
	echo '</script>';

}
else{
	echo '<script type="text/javascript">alert("Email sau parola gresit ");</script>';
	echo '<script type="text/javascript">location.href = "login2.php";</script>';

}


	


$mysqli->close();

?>