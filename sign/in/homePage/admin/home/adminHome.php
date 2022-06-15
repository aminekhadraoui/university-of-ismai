<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<section>
  <!--for demo wrap-->
  <h1>Admin Panel</h1>
  <hr>
  <h1 style="color:white;text-align:center;">Delete User</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>email</th>
          <th>name</th>
          <th>last name</th>
          <th>cin</th>
          <th>genre</th>
          <th>account type</th>
          <th>level </th>
          <th>delete user</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>
          
        </tr>
        <?php
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

$sql = "SELECT * FROM signup";
$result = $conn->query($sql);
$i=1;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>" ."<td> user [" .$i."]".
    $row["email"]. "</td>" ."<td>" .$row["name"]. "</td> <td>" . $row["lastname"]. "</td>". "<td>".$row["cin"]."</td><td>".$row["genre"]."</td><td>".$row["typeaccount"]."</td><td>".$row["classes"]."</td><td><a href='php/deleteuser.php?user=".$row["email"]."'> X</a></td></tr>";
    $i++;
}
} else {
  echo "0 user";
}
$conn->close();
?>
      </tbody>
    </table>
  </div>
</section>

<!-- delete publicite  -->
<h1>Delete Publication</h1>
<div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>user</th>
          <th> nom publication </th>
          <th> description</th>
          
          <th>delete publication</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>
          
        </tr>
        <?php
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

$sql = "SELECT * FROM publication";
$result = $conn->query($sql);
$i=1;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" .$row["user"]. "</td> <td>" . $row["nameproject"]. "</td>". "<td>".$row["description"]."</td>"."<td><a href='php/deletepub.php?username=".$row["user"]."'> X</a></td></tr>";
    $i++;
}
} else {
  echo "0 publication";
}
$conn->close();
?>
      </tbody>
    </table>
  </div>
</section>

<!-- end -->
<h1>Connected User</h1>
<div class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>user</th>
          <th> statut </th>
          
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>
          
        </tr>
        <?php
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

$sql = "SELECT * FROM connected where statut='on' and email!='$user' ";
$result = $conn->query($sql);
$i=1;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" .$row["email"]. "</td> <td>" . $row["statut"]. "</td>";
    $i++;
}
} else {
  echo "0 publication";
}
$conn->close();
?>
      </tbody>
    </table>
  </div>
</section>

<!-- follow me template -->
<div class="made-with-love">
 
  <a href="php/logout.php" style="font-size:20px;">log out</a>
</div>
</body>
</html>