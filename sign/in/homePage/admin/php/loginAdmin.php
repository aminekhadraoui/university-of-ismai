<?php
// DB credentials.
define('DB_HOST','localhost'); // Host name
define('DB_USER','root'); // db user name
define('DB_PASS','madara1998'); // db user password name
define('DB_NAME','github'); // db name
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

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

if(isset($_POST["username"])){
$username=$_POST["username"];
$pass= $_POST["password"];
$sql = "SELECT * FROM admin where email='$username' and password='$pass' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<h3 style='color:green;position:absolute; top:400px;'>user found </h3>";
	
header("Location: ../home/adminHome.php");
 
} else {
  echo "<h3 style='color:green;position:absolute; top:400px;'>user not found </h3>";
  header("Location: ../admin.php");
}
}
$conn->close();
?>