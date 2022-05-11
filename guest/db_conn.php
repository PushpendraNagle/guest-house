<?php
$sname= "localhost";
$unmae= "root";
$password = "nagle127";

$db_name = "guest_house";

$db = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$db) {
	die('Could not Connect MySql Server');
}
?>