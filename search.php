
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
    $sql="INSERT INTO stories (storyimage, story) VALUES ('$storyimage', '$storytxt')";
    $result=$conn->query($sql);

    $sql="UPDATE stories SET user_id ='$uid';";
    $result=$conn->query($sql);
  }

  if(isset($_POST['searchbtn']))
  {
    include("connection/connection.php");

    if($conn->connect_error)
    {
      die("Connection failed: " .$conn->connect_error);
    } 
    $search=$_POST['search'];
    $sql="select * from stories where story LIKE '$search';";
    $result=$conn->query($sql);
  }

  if(isset($_GET['userclick']))
  { 
    $uc = $_GET['userclick'];
    $search='';
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
    <link rel="stylesheet" href="styles/search.css">
    <script src="welcome.js"></script>
</head>
<body>
  
    <div class="container" style=" margin-top:20px;">
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
                
        </div>
        <div class="hide">
              <form action="search.php" method="post">
                <label for="search" class="searchbar">
                  <input type="search" name="search" id="search" placeholder="Search">
                  <svg xmlns="http://www.w3.org/2000/svg" class="searchicon" viewBox="0 0 24 24" ><g data-name="Layer 2"><path d="m20.71 19.29-3.4-3.39A7.92 7.92 0 0 0 19 11a8 8 0 1 0-8 8 7.92 7.92 0 0 0 4.9-1.69l3.39 3.4a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zM5 11a6 6 0 1 1 6 6 6 6 0 0 1-6-6z" data-name="search"></path></g></svg>
                  <input class="searchbtn" type="submit" name="searchbtn" value="Search" style="display: none">
                </label>
              </form>
            </div>
        </div>
        <div class="feed">
            <?php
            
            // echo "<center><h2><b>Search Results For : $search </b></h2></center>";
            //   include("connection/connection.php");
            //   $y1="select * from stories where story like '%$search%';";
            //   $z1=$conn->query($y1);
            //   if($z1->num_rows>0)
            //   {
            //   while($t=$z1->fetch_assoc())
            //     {
            //       echo "<div class='storybox'>
            //       <div class='storyimgbox'><img class='storyimages' src='images/".$t["storyimage"]."'></div> 
            //       <p class='storytxtbox'>".$t['story']."</p></div>
            //       <div class='likebtns'>
            //       <svg onclick='like()' xmlns='http://www.w3.org/2000/svg' viewBox='-06 -06 24 24' id='like' ><path d='M14 6h-4V3c0-1.103-.897-2-2-2H6.5a.5.5 0 0 0-.5.5v2.367L4.066 7.252A.493.493 0 0 0 4 7.5v7a.5.5 0 0 0 .5.5h8.025a2 2 0 0 0 1.827-1.188l1.604-3.609A.491.491 0 0 0 16 10V8c0-1.103-.897-2-2-2zM0 7.5v7a.5.5 0 0 0 .5.5H3V7H.5a.5.5 0 0 0-.5.5z'></path></svg>                    
            //       <svg onclick='dislike()' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' id='dislike' ><path d='M14 6h-4V3c0-1.103-.897-2-2-2H6.5a.5.5 0 0 0-.5.5v2.367L4.066 7.252A.493.493 0 0 0 4 7.5v7a.5.5 0 0 0 .5.5h8.025a2 2 0 0 0 1.827-1.188l1.604-3.609A.491.491 0 0 0 16 10V8c0-1.103-.897-2-2-2zM0 7.5v7a.5.5 0 0 0 .5.5H3V7H.5a.5.5 0 0 0-.5.5z'></path></svg>                    
            //       </div>
            //       <p class='timestamp'>".$t['datetime']."</p>";
            //     }
            //   }
              
            include("connection/connection.php");
                
              $y2="select * from users where Username ='$search' ;";
              $z2=$conn->query($y2);
              if($z2->num_rows>0)
              { 

                while($t2=$z2->fetch_assoc())
                { 
                echo"<a href='search.php?userclick=$search' name='userclick' class='link'>
                    <div class='searchuserbox'>
                    <p class='usernamelist'>".$t2['Username']."</p></div></a>";
                }
              }
   
            if(isset($_GET['userclick']))
            {
                $a1="select * from users where Username='$uc';";
                $b1=$conn->query($a1);
                $c1=$b1->fetch_assoc();
                $c=$c1['UID'];

                $a4="select * from user_personal_details where user_id='$c';";
                $b4=$conn->query($a4);
                $c4=$b4->fetch_assoc();
                $dp1=$c4['user_image'];
                $dpName=$c4['name'];

                $a2="select * from stories where user_id='$c';";
                $b2=$conn->query($a2);
                

                echo "<center><img class='otherdp' src='images/$dp1'><h2>$dpName's Account</h2></center>";
                if($b2->num_rows>0)
                {
                    while($c2=$b2->fetch_assoc())
                    {
                        
                        echo "<div class='storybox'>
                        <div class='storyimgbox'><img class='storyimages' src='images/".$c2["storyimage"]."'></div> 
                        <p class='storytxtbox'>".$c2['story']."</p></div>
                        <div class='likebtns'>
                        <svg onclick='like()' xmlns='http://www.w3.org/2000/svg' viewBox='-06 -06 24 24' id='like' ><path d='M14 6h-4V3c0-1.103-.897-2-2-2H6.5a.5.5 0 0 0-.5.5v2.367L4.066 7.252A.493.493 0 0 0 4 7.5v7a.5.5 0 0 0 .5.5h8.025a2 2 0 0 0 1.827-1.188l1.604-3.609A.491.491 0 0 0 16 10V8c0-1.103-.897-2-2-2zM0 7.5v7a.5.5 0 0 0 .5.5H3V7H.5a.5.5 0 0 0-.5.5z'></path></svg>      
                        <svg onclick='dislike()' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' id='dislike' ><path d='M14 6h-4V3c0-1.103-.897-2-2-2H6.5a.5.5 0 0 0-.5.5v2.367L4.066 7.252A.493.493 0 0 0 4 7.5v7a.5.5 0 0 0 .5.5h8.025a2 2 0 0 0 1.827-1.188l1.604-3.609A.491.491 0 0 0 16 10V8c0-1.103-.897-2-2-2zM0 7.5v7a.5.5 0 0 0 .5.5H3V7H.5a.5.5 0 0 0-.5.5z'></path></svg>
                        </div>
                        <p class='timestamp'>".$c2['datetime']."</p>";
                      }
                }
            }
            ?>   
         </div>
    </div>
    <br>
    <div class="footer">
        <p>Jeeta &copy; Copyright 2000 - 2023</p>
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