<?php 
$server =  'localhost';
$user = 'root';
$pass = '';
$db = 'sudo';


$conn = mysqli_connect($server,$user,$pass) or die("error");

$selectdb = mysqli_select_db($conn,$db) or die("error");

if (isset($_COOKIE["login"])) {
	$login = $_COOKIE["login"];
} else {
	$login = 0;
}

 ?>