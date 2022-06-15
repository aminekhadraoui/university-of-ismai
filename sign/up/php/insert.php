<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "madara1998";
$dbname = "ismai";


$textarea = $_POST["textarea"];
$email = $_POST["email"];
$name = $_POST["name"];
$pswd = $_POST["password"];
$lastName = $_POST["lastName"];
$cin = $_POST["cin"];
if(!empty($_POST['typeAccount']) && (!empty($_POST['Classes'])) && (!empty($_POST['Genre']))  ){
$typeAccount= $_POST['typeAccount'];
$classes = $_POST['Classes'];
$genre = $_POST['Genre'];
}

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // cin	genre	password	aboutyou	typeaccount	classes

  $sql = "INSERT INTO signup
VALUES ('$email', '$name', '$lastName','$cin','$genre','$pswd','$textarea','$typeAccount','$classes');
INSERT INTO connected
VALUES ('$email', '')

";
  $conn->exec($sql);
/*echo '<script language="javascript">';
echo 'alert("message successfully sent")';
echo '</script>';*/
  
  
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
header("Location: ../image-upload-php-and-mysql-main/index.php");












$_SESSION["username"] = $email;
$_SESSION["password"] = $pswd; 
$conn->close();
?>
