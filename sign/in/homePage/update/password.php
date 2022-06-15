<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "madara1998";
$dbname = "ismai";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$user = $_SESSION["username"];
$pass = $_POST["password"];
$newPass = $_POST["newPassword"];
$sql = "UPDATE signup SET password='$newPass' WHERE password='$pass' and email='$user' ";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
  header("Location: ./updateinfo.html");
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>