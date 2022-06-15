<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "madara1998";
$dbname = "ismai";

$user = $_SESSION["username"];
$class = $_POST["classname"];
$link = $_POST["link"];
$meet = $_POST ["datemeet"];

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // cin	genre	password	aboutyou	typeaccount	classes

  $sql = "INSERT INTO meeting
VALUES ('$class', '$link', '$meet','$user');
";
  $conn->exec($sql);
/*echo '<script language="javascript">';
echo 'alert("message successfully sent")';
echo '</script>';*/
  
  
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
header("Location: ../");

$conn->close();
?>
