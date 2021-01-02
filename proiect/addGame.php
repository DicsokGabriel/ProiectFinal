<?php
include('ajax3.js');
$servername = "localhost";
$username = "root";

$dbname = "users";



// Create connection
$mysqli = new mysqli("localhost", $username, "", $dbname);

$userID= $_GET['xy'];
$productID= $_GET['hello'];

$checkEmail="UPDATE products set cart="  " where id=1;";
$checkEmail_run=mysqli_query($mysqli,$checkEmail);
$my=mysqli_fetch_array($checkEmail_run);
 
	


$mysqli->close();

?>