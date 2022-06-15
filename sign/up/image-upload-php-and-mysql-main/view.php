<?php
session_start();
?>
<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>View</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			min-height: 100vh;
			background-image: linear-gradient(to top right,#bf7f6b 0%, #e6d9a7 100%);
		}
		.alb {
			width: 200px;
			height: 200px;
			padding: 5px;
		}
		.alb img {
			width: 100%;
			height: 100%;
		}
		a {
			text-decoration: none;
			color: black;
		}
		.profil{
			color : #e08580;
		}
		hr{
			color:black;
		}
	</style>
</head>
<body>
     <a href="../../../sign/in/index.php">&#8592;</a>
     <?php 
	 		$user = $_SESSION["username"];
          $sql = "SELECT * FROM images where id='$user'";
          $res = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($res) > 0) {
			echo $images['image_url'];
          	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             <div class="alb">
				 <h1 class="profil">Profile Picture</h1>
					<hr>
				 <img src="<?=$images['image_url']?>">
             </div>
          		
    <?php } }?>
</body>
</html>
<?php
 /*$user = $_SESSION["username"];
 echo $user;
 echo "helooooooooo";*/
?>