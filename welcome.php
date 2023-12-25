<?php
  if(isset($_POST['savebtn']))
  {    
    include("connection/connection.php");

    if($conn->connect_error)
    {
      die("Connection failed: " .$conn->connect_error);
    }
    
  
    $image_name=$_FILES['image']['name'];
    $image_tmp_name=$_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp_name,"images/".$image_name);

    $uid=$_COOKIE['UID'];
    $sql="UPDATE user_personal_details SET user_image = '$image_name' WHERE user_id ='$uid';";
    $result=$conn->query($sql);

  }

  
  if(isset($_POST['upload']))
  {
    include("connection/connection.php");

    if($conn->connect_error)
    {
      die("Connection failed: " .$conn->connect_error);
    }

    $storytxt=$_POST['storytxt'];
    $storyimage=$_FILES['storyimg']['name'];
    $image_tmp_name=$_FILES['storyimg']['tmp_name'];
    move_uploaded_file($image_tmp_name,"images/".$storyimage);

    $uid=$_COOKIE['UID'];
    $sql="INSERT INTO stories (storyimage, story, user_id) VALUES ('$storyimage', '$storytxt', '$uid')";
    $result=$conn->query($sql);
    
  }
  
if(isset($_COOKIE['Username']) && isset($_COOKIE['Password']))
{
  
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles/welcome.css">
    <script src="welcome.js"></script>
</head>
<body>
<div class="menu">
  <div  class="optionbar">
    <div class="oplist">
      <div class="options">
        <form action="search.php" method="post">
          <label for="search" class="searchbar">
            <input type="search" name="search" id="search" placeholder="Search">
            <svg xmlns="http://www.w3.org/2000/svg" class="searchicon" viewBox="0 0 22 22" ><g data-name="Layer 2"><path d="m20.71 19.29-3.4-3.39A7.92 7.92 0 0 0 19 11a8 8 0 1 0-8 8 7.92 7.92 0 0 0 4.9-1.69l3.39 3.4a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zM5 11a6 6 0 1 1 6 6 6 6 0 0 1-6-6z" data-name="search"></path></g></svg>
            <input class="searchbtn" type="submit" name="searchbtn" value="Search" style=" display: none;">
          </label>
        </form>
      </div>
    </div>

    <div title="Edit Profile" onclick="openForm()" class="oplist">
      <svg  class="addimgicon" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" id="Edit"><path d="M3.5,24h15A3.51,3.51,0,0,0,22,20.487V12.95a1,1,0,0,0-2,0v7.537A1.508,1.508,0,0,1,18.5,22H3.5A1.508,1.508,0,0,1,2,20.487V5.513A1.508,1.508,0,0,1,3.5,4H11a1,1,0,0,0,0-2H3.5A3.51,3.51,0,0,0,0,5.513V20.487A3.51,3.51,0,0,0,3.5,24Z" fill="#000" class="color000000 svgShape"></path><path d="M9.455,10.544l-.789,3.614a1,1,0,0,0,.271.921,1.038,1.038,0,0,0,.92.269l3.606-.791a1,1,0,0,0,.494-.271l9.114-9.114a3,3,0,0,0,0-4.243,3.07,3.07,0,0,0-4.242,0l-9.1,9.123A1,1,0,0,0,9.455,10.544Zm10.788-8.2a1.022,1.022,0,0,1,1.414,0,1.009,1.009,0,0,1,0,1.413l-.707.707L19.536,3.05Zm-8.9,8.914,6.774-6.791,1.4,1.407-6.777,6.793-1.795.394Z" fill="#000" class="color000000 svgShape"></path></svg>
      <span >Edit Profile</span>
    </div>

    <div title="Add Story" onclick="openStoryForm()" class="oplist">
      <svg  xmlns="http://www.w3.org/2000/svg"  height="256" viewBox="0 0 67.733 67.733"><path d="M18.094 231.519c-8.73 0-15.841 7.112-15.841 15.842v31.545c0 8.73 7.11 15.842 15.841 15.842h31.545c8.73 0 15.842-7.112 15.842-15.842V247.36c0-8.73-7.112-15.842-15.842-15.842zm0 5.293h31.545c5.89 0 10.55 4.659 10.55 10.549v31.545c0 5.89-4.66 10.548-10.55 10.548H18.094c-5.89 0-10.549-4.658-10.549-10.548V247.36c0-5.89 4.659-10.549 10.549-10.549zm16.395 8.068a2.646 2.646 0 0 0-2.608 2.682v12.752h-12.75a2.646 2.646 0 1 0 0 5.29h12.75v12.75a2.647 2.647 0 1 0 5.293 0v-12.75h12.75a2.646 2.646 0 1 0 0-5.29h-12.75v-12.752a2.646 2.646 0 0 0-2.685-2.682z" color="#000"  transform="translate(0 -229.267)" ></path></svg>
      <span>Add Story</span>
    </div>

    <a  title="Logout" class="logout" href="logout.php">
    <div  class="oplist">
      
      <svg  id="d1" onmouseenter="fun1()" onmouseleave="fun2()" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21" id="logout"><g data-name="Layer 2"><g data-name="log-out"><rect width="24" height="24" opacity="0" transform="rotate(90 12 12)"></rect><path d="M7 6a1 1 0 0 0 0-2H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h2a1 1 0 0 0 0-2H6V6zM20.82 11.42l-2.82-4a1 1 0 0 0-1.39-.24 1 1 0 0 0-.24 1.4L18.09 11H10a1 1 0 0 0 0 2h8l-1.8 2.4a1 1 0 0 0 .2 1.4 1 1 0 0 0 .6.2 1 1 0 0 0 .8-.4l3-4a1 1 0 0 0 .02-1.18z"></path></g></g>
      <?php
            if(isset($_COOKIE['Username']))
            {            
              echo $_COOKIE['Username'];
            }
            ?>
      </svg>
      <span >Log Out</span>
        
    </div>
    </a>
    <div class="newposts">
      <h3>Recent Uploads</h3>
    <?php

      $uid=$_COOKIE['UID'];
      include("connection/connection.php"); 
      $y1="select * from stories";
      $z1=$conn->query($y1);
      if($z1->num_rows>0)
      {
      while($t=$z1->fetch_assoc())
        {
          echo "<img class='menuposts' src='images/".$t["storyimage"]."'>";
        }
      }
    ?>
    </div>
  </div>
</div>
    <div class="container">
        <div class="cover" >

            <div class="dptools">
            <div class="dp" >
              <img class="image"  src="images/<?php 

                $username= $_COOKIE['Username'];

                include("connection/connection.php");

                $s="select * from users where Username ='$username';";

                $r=$conn->query($s);

                $rows=$r->fetch_assoc();

                $x1=$rows['UID'];

                $s1="select * from user_personal_details where user_id='$x1';";

                $r2=$conn->query($s1);

                $Row=$r2->fetch_assoc();

                $y=$Row['user_image'];

                echo $y;
                
            ?>">
            
              <svg class="dpicon" onclick="openForm()" xmlns="http://www.w3.org/2000/svg" viewBox="-10 -4 35 35" id="user"><path fill="#00ffe1" d="M7.763 2A6.77 6.77 0 0 0 1 8.763c0 1.807.703 3.505 1.98 4.782a6.718 6.718 0 0 0 4.783 1.981 6.77 6.77 0 0 0 6.763-6.763A6.77 6.77 0 0 0 7.763 2ZM3.675 13.501a5.094 5.094 0 0 1 3.958-1.989c.024.001.047.007.071.007h.023c.022 0 .042-.006.064-.007a5.087 5.087 0 0 1 3.992 2.046 6.226 6.226 0 0 1-4.02 1.468 6.212 6.212 0 0 1-4.088-1.525zm4.032-2.494c-.025 0-.049.004-.074.005a2.243 2.243 0 0 1-2.167-2.255 2.246 2.246 0 0 1 2.262-2.238 2.246 2.246 0 0 1 2.238 2.262c0 1.212-.97 2.197-2.174 2.232-.028-.001-.056-.006-.085-.006Zm4.447 2.215a5.594 5.594 0 0 0-3.116-2.052 2.749 2.749 0 0 0 1.428-2.412A2.747 2.747 0 0 0 7.704 6.02a2.747 2.747 0 0 0-2.738 2.762 2.73 2.73 0 0 0 1.422 2.386 5.602 5.602 0 0 0-3.081 1.995 6.22 6.22 0 0 1-1.806-4.398 6.27 6.27 0 0 1 6.263-6.263 6.27 6.27 0 0 1 6.263 6.263 6.247 6.247 0 0 1-1.873 4.457z"></path></svg>
              </div>
                 

            </div>
              <div class="form-popup" id="myForm">
                    <form class="form-container" method="POST" enctype="multipart/form-data">
                    <label class="editdp" for="editdp">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-25 -30 100 100" id="user-square"><rect width="256" height="256" fill="none"></rect><path d="M41,11H21.57L20.45,8.69A3,3,0,0,0,17.75,7H7a3,3,0,0,0-3,3V38a3,3,0,0,0,3,3H41a3,3,0,0,0,3-3V14A3,3,0,0,0,41,11Zm1,27a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V10A1,1,0,0,1,7,9H17.75a1,1,0,0,1,.9.56l2.79,5.75A3,3,0,0,0,24.14,17H39a1,1,0,0,0,0-2H24.14a1,1,0,0,1-.9-.56L22.54,13H41a1,1,0,0,1,1,1Z" data-name="01 Folder"></path></svg>
                        <p id="imgtxt">Choose Photo</p>
                        </label>
                        <input type="file" id="editdp" name="image" onchange = " imgtxt.innerHTML='Selected'; ";>
                        
                        <button type="submit" class="btn" name="savebtn">Save</button>
                        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                    </form>
                </div>
        </div>
        <div class="hide">
          <div class="form-popup" id="postform">
                  <form class="form-container" method="POST" enctype="multipart/form-data">
                      <input type="text" name="storytxt" class="storytxt" wordwrap placeholder="Type Your Story">
                      <label class="editdp2" for="editdp2">
                        <p id="imgtxt2">Upload Photo</p>
                      </label>
                      <input type="file" id="editdp2" name="storyimg" onchange = " imgtxt2.innerHTML='Selected'; document.getElementById('imgtxt2').style.backgroundColor='black'; document.getElementById('imgtxt2').style.color='white';";>
                      <button type="submit" class="btn" name="upload" >Post</button>
                      <button type="button" class="btn cancel" onclick="closeStoryForm()">Close</button>
                  </form>
              </div>
              
        </div>
        <div class="feed">
            <?php

              $uid=$_COOKIE['UID'];
              include("connection/connection.php"); 
              $y1="select * from stories where user_id='$uid';";
              $z1=$conn->query($y1);
              if($z1->num_rows>0)
              {
              while($t=$z1->fetch_assoc())
                {
                  echo "<div class='storybox'>
                  <div class='storyimgbox'><img class='storyimages' src='images/".$t["storyimage"]."'></div>
                  <p class='storytxtbox'>".$t['story']."</p></div>
                  <div class='likebtns'>
                  <svg onclick='like()' xmlns='http://www.w3.org/2000/svg' viewBox='-06 -06 24 24' id='like' ><path d='M14 6h-4V3c0-1.103-.897-2-2-2H6.5a.5.5 0 0 0-.5.5v2.367L4.066 7.252A.493.493 0 0 0 4 7.5v7a.5.5 0 0 0 .5.5h8.025a2 2 0 0 0 1.827-1.188l1.604-3.609A.491.491 0 0 0 16 10V8c0-1.103-.897-2-2-2zM0 7.5v7a.5.5 0 0 0 .5.5H3V7H.5a.5.5 0 0 0-.5.5z'></path></svg>            
                  <svg onclick='dislike()' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' id='dislike' ><path d='M14 6h-4V3c0-1.103-.897-2-2-2H6.5a.5.5 0 0 0-.5.5v2.367L4.066 7.252A.493.493 0 0 0 4 7.5v7a.5.5 0 0 0 .5.5h8.025a2 2 0 0 0 1.827-1.188l1.604-3.609A.491.491 0 0 0 16 10V8c0-1.103-.897-2-2-2zM0 7.5v7a.5.5 0 0 0 .5.5H3V7H.5a.5.5 0 0 0-.5.5z'></path></svg>                    
                  </div>
                  <p class='timestamp'>".$t['datetime']."</p>";
                }
              }
            ?>
         </div>
         <br>
    <div class="footer">
        <p>Jeeta &copy; Copyright 2000 - 2023</p>
    </div>
    </div>
</body>
</html>
    <?php
}
else
{
  header("location:login.php");
}
?>