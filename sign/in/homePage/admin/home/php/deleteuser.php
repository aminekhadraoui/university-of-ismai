<?php
$user= $_GET['user'];

$servername = "localhost";
$username = "root";
$password = "madara1998";
$dbname = "ismai";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  
  $sql = "DELETE FROM signup WHERE email='$user'";

  
  $conn->exec($sql);
  echo "Record deleted successfully";
  
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
header('Location:../adminHome.php');

?>