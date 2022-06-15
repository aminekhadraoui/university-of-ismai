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
$name = $_POST["name"];
$lastname = $_POST["lastname"];
$sql = "UPDATE signup SET name='$name',lastname='$lastname'  where email='$user' ";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
  header("Location: ./updatename.html");
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>