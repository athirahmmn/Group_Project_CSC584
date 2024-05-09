<?php

session_start();

$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "rsmp";

// connection 
$connect = mysqli_connect($sname, $unmae, $password, $db_name);
if (!$connect) 
{
	die("Connection failed: " . mysqli_connect_error());
}
?>
