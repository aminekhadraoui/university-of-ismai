<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    
</head>
<body>
<div class="content-profile-page">
   <div class="profile-user-page card">
      <div class="img-user-profile">
         
      <?php 
            $servername = "localhost";
            $username = "root";
            $password = "madara1998";
            $dbname = "ismai";
            session_start();
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
             $user = $_SESSION["username"];
            
          $sql = "SELECT * FROM images where id='$user'";
          $res = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             <div class="alb">
             	<img src="../../../up/image-upload-php-and-mysql-main/<?=$images['image_url']?>"
                 alt="noimage" style="height:100px;
                    width:100px;
                    
                    border:4px solid white;
                    
                    margin:10px auto 0 0px;"
                 
                 >
             </div>
          		
    <?php } }?>
<hr>
               </div>
          <a href=".." class="back">back</a>
          <div class="user-profile-data">
          <div class="description-profile"><b><h1 style="color:#08044c;"><i class='bi bi-person-circle'></i> Information profil </h1></b></div>
<?php
$servername = "localhost";
$username = "root";
$password = "madara1998";
$dbname = "ismai";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
$user = $_SESSION["username"];
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM signup where email='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<b><h2><label style='color:#d4d5e1;'>CIN : </label>".$row["cin"]." <br><label style='color:#d4d5e1;'>Name : </label>".$row["name"]."<br><label style='color:#d4d5e1;'>Last Name : </label>".$row["lastname"]."<br><label style='color:#d4d5e1;'>Genre : </label>".$row["genre"]."<br><label style='color:#d4d5e1;'>Type of account : </label>".$row["typeaccount"]."<br><label style='color:#d4d5e1;'>Class :</label>".$row["classes"]."</h2></b>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

            <hr>
           
          </div> 
          
       <ul class="data-user">
        <li><a><strong>
        <?php
$con = mysqli_connect("localhost","root","madara1998","ismai");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql="select count(*) as total from commentaire";
$result=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
?>

        
        </strong><span>Posts</span></a></li>
        <ul class="data-user">
        <li><a><strong>
        <?php
$con = mysqli_connect("localhost","root","madara1998","ismai");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql="select count(*) as total from connected";
$result=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
?>
        </strong><span>connected</span></a></li>
       </ul>
       
      </div>

    </div>


</body>
</html>
