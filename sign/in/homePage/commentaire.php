<?php
$servername = "localhost";
$username = "root";
$password = "madara1998";
$dbname = "ismai";
session_start();
$user = $_SESSION["username"];
$textarea=$_POST["w3review"];
$projname = $_GET["project"];
$nameproj=$_SESSION["nameproject"];
echo $nameproj;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO commentaire VALUES ('$user', '$textarea','$projname')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("location: index.php");
?>