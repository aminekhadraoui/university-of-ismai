<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "madara1998";
$dbname = "ismai";
$user = $_SESSION["username"];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $sql = "UPDATE connected SET statut='on' WHERE email='$user'";
  
    // Prepare statement
    $stmt = $conn->prepare($sql);
  
    // execute the query
    $stmt->execute();
  
    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " ";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
  $conn = null;
?>
<html lang="en">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mainbody.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/activities.css">
    <title>Ismai</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    
    <style>
      *{font-family: -apple-system, BlinkMacSystemFont, 
                        'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 
                        'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .control-panel{
            display:flex;
            flex-direction:column;
        }
        .control-panel textarea{
            width:220px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            font-size: 16px;
            resize: none;
        }
        .control-panel input[type=text]{
            width:220px;
            border: none;
            border-bottom: 2px solid red;
        }
        .post-pub{
            background-color:#24292f;
            color:white;
            text-decoration:none;
            
        }
.uploadBtn{
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 7px 40px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 20px 50px;
  transition-duration: 0.4s;
  cursor: pointer;
}
.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button5:hover {
  background-color: #555555;
  color: white;
}
input[type=file]{
    background-color:#555555;
    width:200px;
    color:white;
}
.button-coment{
  border:none;
}
.areatext{
  margin-top:20px;
  margin-bottom:20px;
  border:1px solid black;
}
    </style>
<script src="search/jquery.js"></script>
<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("search/search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>
<body>

    <!-- Nav bar header -->
    <div class="header">
        <div class="header_left">
     
        <i class="bi bi-bank"></i>
            <div class="search_box">
                <i class="bi bi-search"></i>
                <input type="text" class="search_input" placeholder="Search or jump to..">
            </div>
        </div>
        <div class="header_right">
            <div class="nav_link ">
             
                <div class="nav_text"></div>
            </div>

            <div class="nav_link network">
                
                <div class="nav_text"></div>
            </div>

            <div class="nav_link jobs">
                
                <div class="nav_text"></div>
            </div>

            <div class="nav_link">
                
                <div class="nav_text">
                    </div>
            </div>

            <div class="nav_link">
                <div class="nav_icon">
                    <div class="info">  <?php
$con = mysqli_connect("localhost","root","madara1998","ismai");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql="select count(*) as total from meeting";
$result=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
?></div>
                  
                    <a href="notif.php"><i class="bi bi-bell-fill" style="font-size: 1.3rem  !important;"></i></a>
                </div>
                
            </div>

            <div class="header_right_2">
                <div class="nav_link">
                    <div class="nav_icon">
                    <i class="bi bi-bank"></i>
                        <div class="nav_text dropdown drop">
                         
                                <i class="bi bi-caret-down-fill dropdown" style="font-size: 1rem  !important; float: center;"></i>
                                <div class="dropdown-content">
                                    <div class="dropdown_profile">
                                   <!--image-->
                                   <?php 
            $servername = "localhost";
            $username = "root";
            $password = "madara1998";
            $dbname = "ismai";
            
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
             	<img src="../../up/image-upload-php-and-mysql-main/<?=$images['image_url']?>"
                 alt="noimage" style="height:30px;
                    width:30px;
                    border-radius: 50%;
                    border:4px solid white;
                    
                    margin:10px auto 0 0px;"
                 
                 >
             </div>
          		
    <?php } }?>
                                   <!--end image-->
                                        <!--<img src="image.png" style="height:50px;object-fit: contain;border-radius:50px;" alt="noimage">-->
                                        <div class="dropdown_profile_info" style="padding-left:10px;">
                                            <div class="act_title">
                                           <?php
                                        $user = $_SESSION["username"];
                                        echo $user;
                                        ?>
                                            </div>
                                            <div class="acoount_name">
                                                 <!--description-->
                    <?php
$con = mysqli_connect("localhost","root","madara1998","ismai");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$user = $_SESSION["username"];
                     
$sql = "SELECT * FROM signup where email='$user'";

if ($result = mysqli_query($con, $sql)) {
  // Fetch one and one row
  while ($row = mysqli_fetch_row($result)) {
    echo $row[2];
  }
  mysqli_free_result($result);
}

mysqli_close($con);
?>

                   <!--end description--> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile_view_button">
                                        View profile
                                    </div>

                                    <div class="bdr_bottom"></div>
                                    <div class="title" style="color:black;">Accounts</div>
                                    <div class="list"><a href="update/updateinfo.html">Settings & Privacy</a></div>
                                    <div class="list">Help</div>
                                    <div class="list bdr_bottom">Language</div>

                                    <div class="title" style="color:black;">Manage</div>
                                    <div class="list"><a href="php/logout.php">sign out</a></div>
                                </div>
                             </div>
                    </div>
                </div>
               
                <div class="small_screen">
                    <i class="bi bi-three-dots"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Mainbody -->
    <div class="mainbody">
        <div class="sidebar" style="border:none;">
            
               <div class="sidebar_first_col">
                <div class="profile_header" style="border-top-left-radius: 10px;border-top-right-radius:50px;"></div>
                <!--<img src="img/profile.jpeg" alt="noimage" style="height:80px;
                    width:80px;
                    border-radius: 50%;
                    border:4px solid white;
                    
                    margin:-35px auto 0 auto;" >-->
                <?php 
            $servername = "localhost";
            $username = "root";
            $password = "madara1998";
            $dbname = "ismai";
            
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
             	<img src="../../up/image-upload-php-and-mysql-main/<?=$images['image_url']?>"
                 alt="noimage" style="height:80px;
                    width:80px;
                    border-radius: 50%;
                    border:4px solid white;
                    
                    margin:-35px auto 0 80px;"
                 
                 >
             </div>
          		
    <?php } }?>
                <div class="profile_info">
                    <p style="text-align: center;" class="act_title"><?php
                                        $user = $_SESSION["username"];
                                        echo $user;
                                        ?></p>
                    <p class="account_name">
                    <!--description-->
                    <?php
$con = mysqli_connect("localhost","root","madara1998","ismai");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$user = $_SESSION["username"];
                     
$sql = "SELECT * FROM signup where email='$user'";

if ($result = mysqli_query($con, $sql)) {
  // Fetch one and one row
  while ($row = mysqli_fetch_row($result)) {
    echo "CIN : ".$row[3]."<br> Name :".$row[1]."<br>Last Name : ".$row[2]."<br>Genre :".$row[4]."<br>Type of account : ".$row[7];
  }
  mysqli_free_result($result);
}

mysqli_close($con);
?>

                   <!--end description--> 

                    </p>
                </div>
                
                <div style="border:0.2px solid lightgrey"></div>
                <div class="connections" >
                   <!-- <span style="float:left" class="account_name" >connections</span>
                    <span style="float:right"><a href="#" style="color:blue;">30</a></span>
                    <br>
                    <h6>Grow your network</h6>-->
                </div>
                <div class="viewed" >
                    <!--<div class="text" class="account_name" >idea</div>-->
                    <!--<div><a href="#" style="color:blue;">30</a></div> -->
                </div>

                <div class="sidebar_access">
                    <div class="account_name" ></div>
                    <a href="#" > </a>
                </div>
                <div class="sidebar_footer">
                <i class="bi bi-cast"></i>
                    <div>Publish course</div>
                </div>
               </div>
             
               <div class="sidebar_second_col">
                   <div class="sidebar_title">Push course</div>
                    <div class="recent">
                        <div class="sidebar_second_text">
                        <!--upload project-->

                        <?php
session_start(); 
?>

  <?php
    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      printf('<b>%s</b>', $_SESSION['message']);
      unset($_SESSION['message']);
    }
  ?>
  <form method="POST" action="php/upload.php" enctype="multipart/form-data">
    <div class="control-panel">
        <label>folder name</label>
      <input type="text" name="directoryName"><br>
      <label>Document name</label>
      <input type="text" name="projectName"><br>
      <label>Document description</label>
      <textarea name="description"></textarea><br>

      <span>PUSH PROJECT</span>
      <input type="file" name="uploadedFile" />
    </div>

    <input type="submit" class="uploadBtn button5" name="uploadBtn" value="Push" />
  </form>


                        <!--end upload-->


                        </div>
                        
     
                    
                    </div>
                    <div class="sidebar_title" style="color:blue"></div>
             

                    <div class="recent">
                        <div class="sidebar_second_text"></div>
                        <div class="sidebar_second_text"> </div>
     
                        
                    </div>

                    <div class="sidebar_title" style="color:blue"></div>
             

                    <div class="recent">
                        <div class="sidebar_second_text"></div>
                       
     
                        
                    </div>
               </div>

        </div>



















        <div class="posts">
            <div class="post_box">
                <div class="input">
                    <div class="input_text">
                   <!--upload here--> 
                    </div>
                    <div class="input_blocks">
                        <div class="input_option">
                            <div class="option"><a href="chat/index.php">Chat</a></div>
                        </div>
                        <div class="input_option">
                        <?php
                    
                    $con = mysqli_connect("localhost","root","madara1998","ismai");
  
                      if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        exit();
                      }
                      $user = $_SESSION["username"];
                                      
                      $sql = "SELECT * FROM signup where email='$user'";
                      
                      if ($result = mysqli_query($con, $sql)) {
                        // Fetch one and one row
                        while ($row = mysqli_fetch_row($result)) {
                          
                          if($row[7]!='Student'){
                       echo " <div class='option'><a href='repositories/index.html'>meeting</a></div>";
                       mysqli_free_result($result);
                          }
                        
                      }
                      
                    }
                      mysqli_close($con);
                      ?>
  

                           
                        </div>
                  </div>
                </div>
              
            </div>
           



            

                       
                   <!--select data fetch-->
                   <?php
$servername = "localhost";
$username = "root";
$password = "madara1998";
$dbname = "ismai";
$user = $_SESSION["username"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM publication,signup where publication.user=signup.email  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
$i=0;
print_r($lines);
  while($row = $result->fetch_assoc()) {
    $filename = $row["path"];
$fp = fopen($filename, "r");
$user = $_SESSION["username"]; 
$content = fread($fp, filesize($filename));
$lines = explode("\n", $content);
echo "
<div class='post_item'>
                <div class='post_item_header'>
                    <div class='post_item_info'>
                        
                       
                    <div class='post_item_owner' style='margin-left:8px;'>
                        <a href='#' class='act_title'>". $row["email"] ."</a>
                        <p class='account_name'>Cours-ISMAI</p>
                        <p class='account_name'>follow</p>
                    </div>
                    </div>
                    <i class='bi bi-three-dots' style='padding:5px;' ></i>
                </div>

                <div class='post_item_body_info' >
                    <p style='font-size: 0.95rem;'>".$row["description"]."
                    </p>    

";
$nameproj=$row["nameproject"];
    $nameproj;
   
    echo "<a href='php/".$row["path"]."' class='post-pub'>".$row["nameproject"]."link : ".$i."</a><br>";
   
    
    echo $row["nameproject"]."fffffffff";
    echo "<form method='POST' action='commentaire.php?project=". $nameproj."'> ";
   
    echo"<textarea id='w3review' name='w3review' rows='3' cols='90' class='areatext'></textarea>
  
    ";


  
   
    
 
    
    


    echo "</div>

                

                

    <div class='post_item_footer'>
    
        <div class='footer_item'>
            <i class='bi bi-hand-thumbs-up'></i> <div>Like</div>
        </div>
        <div class='footer_item'>
            <i class='bi bi-chat-text'></i>   <div><button class='button-coment'>Comment</button></div>
        </div>
        <div class='footer_item'>
            <i class='bi bi-arrow-90deg-right'></i> <div>Share</div>

        </div>
        <div class='footer_item'>
         
        <i class='bi bi-cursor-fill'></i> <div>Send</div>

        </div>
        </div>
        </div>";
       
       
       echo" 
    </form>
";
  }
  
  fclose($fp);
} else {
  echo "0 results";
}
$conn->close();
?>
 
 


   </div>                  
                  <!--end select data --> 
                
        <div class="activity">
           
            <div class="news">
              
                <div class="news_head">
                    <div class="news_title">Connected Person</div>
                    
                    <i class="bi bi-person-check-fill" style="font-size:15px;"></i>
                </div>
                <br>
              
                
                        <?php
                    
                    $con = mysqli_connect("localhost","root","madara1998","ismai");

                    if (mysqli_connect_errno()) {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      exit();
                    }
                    $user = $_SESSION["username"];
                                         
                    $sql = "SELECT * FROM connected where statut='on' and email!='$user' ";
                    
                    if ($result = mysqli_query($con, $sql)) {
                      // Fetch one and one row
                      while ($row = mysqli_fetch_row($result)) {
                        echo "<div class='new_list'>
                        <div class='act_title' style='display: flex;flex-direction: row;align-items: flex-start;'> 
                            <i class='bi bi-record-fill' style='font-size:14px;margin-right:10px;display:block;margin-top:5px;color:green;'></i> ";
                        echo ("<p>".$row[0]."</p><div class='vert'> </div></br>");
                        echo "</div>
                      
                        </div>";
                      }
                      mysqli_free_result($result);
                    }
                    
                    mysqli_close($con);
                    ?>
                    


                
            </div>

           <div class="news">

                <div class="news_head">
                <div class="news_title">All Users</div>
                    
                    <i class="bi bi-person-check-fill" style="font-size:15px;"></i>
                </div>
                <br>
              
                <?php
                    
                    $con = mysqli_connect("localhost","root","madara1998","ismai");

                    if (mysqli_connect_errno()) {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      exit();
                    }
                    $user = $_SESSION["username"];
                                         
                    $sql = "SELECT * FROM  signup order by typeaccount ";
                    
                    if ($result = mysqli_query($con, $sql)) {
                      // Fetch one and one row
                      while ($row = mysqli_fetch_row($result)) {
                        echo "<div class='new_list'>
                        <div class='act_title' style='display: flex;flex-direction: row;align-items: flex-start;'> 
                            <i class='bi bi-record-fill' style='font-size:14px;margin-right:10px;display:block;margin-top:5px;color:black;'></i> ";
                        echo ("<p>".$row[1]." ".$row[2]." :".$row[7]."</p><div class='vert'> </div></br>");
                        echo "</div>
                      
                        </div>";
                      }
                      mysqli_free_result($result);
                    }
                    
                    mysqli_close($con);
                    ?>
                  </div>  

<!--new -->
<div class="news">

                <div class="news_head">
                <div class="news_title">new meeting</div>
                    
                    <i class="bi bi-person-check-fill" style="font-size:15px;"></i>
                </div>
                <br>
              
                <?php
                    
                    $con = mysqli_connect("localhost","root","madara1998","ismai");

                    if (mysqli_connect_errno()) {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      exit();
                    }
                    $user = $_SESSION["username"];
                                         
                    $sql = "SELECT * FROM meeting";
                    
                    if ($result = mysqli_query($con, $sql)) {
                      // Fetch one and one row
                      while ($row = mysqli_fetch_row($result)) {
                        echo "<div class='new_list'>
                        <div class='act_title' style='display: flex;flex-direction: row;align-items: flex-start;'> 
                          ";
                        echo "<p>".$row[2]."  LINK : <a href='".$row[1]."' target='_blank'>".$row[0]."</a></p></br>";
                        echo "</div>
                      
                        </div>";
                      }
                      mysqli_free_result($result);
                    }
                    
                    mysqli_close($con);
                    ?>
                    



    </div>
    <div class="news">

                <div class="news_head">
                    <div class="news_title">Search user </div>
                    <i class="bi bi-search" style="font-size:15px;"></i>
                   
                </div>
                <br>
              
                <div class="new_list">
                    <div class="act_title" style="display: flex;flex-direction: row;align-items: flex-start;"> 
                        
                        <div class="search-box">
        <input type="text" autocomplete="off" class="search_input" placeholder="Search users..." />
        <a href="hello.html" class="result"></a>
            </div>
                    </div>
                   
               </div>

                
            </div>
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

$sql = "SELECT * FROM commentaire";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<div class='news'>

    <div class='news_head'>
        <div class='news_title'>commentaire </div>
        <i class='bi bi-chat'></i>
       
    </div>
    <br>
  
    <div class='new_list'>
        <div class='act_title' style='display: flex;flex-direction: row;align-items: flex-start;'> ";
           
            echo $row["user"]." : ".$row["cmntr"] ." . Commentaire sur ".$row["nameproject"];
        echo "</div>
       
   </div>

    
</div>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

    
</body>
</html>