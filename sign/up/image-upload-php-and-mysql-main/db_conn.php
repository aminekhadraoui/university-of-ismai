<?php  

$sname = "localhost";
$uname = "root";
$password = "madara1998";

$db_name = "ismai";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}