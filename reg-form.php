<?php 
  if(isset($_POST['submit']))
  {
    include("connection/connection.php");

    if($conn->connect_error)
    {
      die("Connection failed: " .$conn->connect_error);
    }

    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

    $sql="insert into users(Username,Password) value('$email','$password');";
    $result=$conn->query($sql);

    $lastid=$conn->insert_id;
    $sql="insert into user_personal_details(user_id,name,mobile_number) value('$lastid','$name','$mobile');";
    $result=$conn->query($sql);

    header("refresh:2,url=login.php");
    echo include("created.php");
  }
  else 
  {
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles/login.css">
  </head>
<body>
  <div class="box">
      <div class="box1"></div>
      <div class="box3"></div>
  </div>
      <h1>Join Us</h1>
        <form method="post">
            <label for="text"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="BusinessCard"><g data-name="Layer 2"  class="color000000 svgShape"><path d="M26.88 9H20V6.57A3.8 3.8 0 0 0 16 3a3.8 3.8 0 0 0-4 3.57V9H5.12A3.12 3.12 0 0 0 2 12.12v13.76A3.12 3.12 0 0 0 5.12 29h21.76A3.12 3.12 0 0 0 30 25.88V12.12A3.12 3.12 0 0 0 26.88 9ZM14 6.57A1.83 1.83 0 0 1 16 5a1.83 1.83 0 0 1 2 1.57V9h-4Zm14 19.31A1.12 1.12 0 0 1 26.88 27H5.12A1.12 1.12 0 0 1 4 25.88V12.12A1.12 1.12 0 0 1 5.12 11h21.76A1.12 1.12 0 0 1 28 12.12Z"  class="color000000 svgShape"></path><path d="M25 14h-7a1 1 0 0 0 0 2h7a1 1 0 0 0 0-2zm0 4h-7a1 1 0 0 0 0 2h7a1 1 0 0 0 0-2zm0 4h-7a1 1 0 0 0 0 2h7a1 1 0 0 0 0-2zm-11.91-2.17A3.46 3.46 0 0 0 14 17.5a3.5 3.5 0 0 0-7 0 3.46 3.46 0 0 0 .91 2.33A4.5 4.5 0 0 0 6 23.5a1 1 0 0 0 2 0 2.5 2.5 0 0 1 5 0 1 1 0 0 0 2 0 4.5 4.5 0 0 0-1.91-3.67zM9 17.5a1.5 1.5 0 1 1 1.5 1.5A1.5 1.5 0 0 1 9 17.5z"  class="color000000 svgShape"></path></g></svg> <input type="text" name="name" required placeholder="Name"></label>
            <label for="email"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="Email"><path d="M53.42 53.32H10.58a8.51 8.51 0 0 1-8.5-8.5V19.18a8.51 8.51 0 0 1 8.5-8.5h42.84a8.51 8.51 0 0 1 8.5 8.5v25.64a8.51 8.51 0 0 1-8.5 8.5ZM10.58 13.68a5.5 5.5 0 0 0-5.5 5.5v25.64a5.5 5.5 0 0 0 5.5 5.5h42.84a5.5 5.5 0 0 0 5.5-5.5V19.18a5.5 5.5 0 0 0-5.5-5.5Z" class="color222222 svgShape"></path><path  d="M32 38.08a8.51 8.51 0 0 1-5.13-1.71L3.52 18.71a1.5 1.5 0 1 1 1.81-2.39L28.68 34a5.55 5.55 0 0 0 6.64 0l23.35-17.68a1.5 1.5 0 1 1 1.81 2.39L37.13 36.37A8.51 8.51 0 0 1 32 38.08Z" class="color222222 svgShape"></path><path  d="M4.17 49.14a1.5 1.5 0 0 1-1-2.62l18.4-16.41a1.5 1.5 0 0 1 2 2.24L5.17 48.76a1.46 1.46 0 0 1-1 .38zm55.66 0a1.46 1.46 0 0 1-1-.38l-18.4-16.41a1.5 1.5 0 1 1 2-2.24l18.39 16.41a1.5 1.5 0 0 1-1 2.62z" class="color222222 svgShape"></path></svg>  <input type="email" name="email" required placeholder="E-Mail"></label> <br>
            <label for="mobile"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="Call"><path d="M19.44,13c-.22,0-.45-.07-.67-.12a9.44,9.44,0,0,1-1.31-.39,2,2,0,0,0-2.48,1l-.22.45a12.18,12.18,0,0,1-2.66-2,12.18,12.18,0,0,1-2-2.66L10.52,9a2,2,0,0,0,1-2.48,10.33,10.33,0,0,1-.39-1.31c-.05-.22-.09-.45-.12-.68a3,3,0,0,0-3-2.49h-3a3,3,0,0,0-3,3.41A19,19,0,0,0,18.53,21.91l.38,0a3,3,0,0,0,2-.76,3,3,0,0,0,1-2.25v-3A3,3,0,0,0,19.44,13Zm.5,6a1,1,0,0,1-.34.75,1.06,1.06,0,0,1-.82.25A17,17,0,0,1,4.07,5.22a1.09,1.09,0,0,1,.25-.82,1,1,0,0,1,.75-.34h3a1,1,0,0,1,1,.79q.06.41.15.81a11.12,11.12,0,0,0,.46,1.55l-1.4.65a1,1,0,0,0-.49,1.33,14.49,14.49,0,0,0,7,7,1,1,0,0,0,.76,0,1,1,0,0,0,.57-.52l.62-1.4a13.69,13.69,0,0,0,1.58.46q.4.09.81.15a1,1,0,0,1,.79,1Z"  class="color000000 svgShape"></path></svg> <input type="number" min="999999999" max="9999999999" name="mobile" required placeholder="    Mobile"></label>
            <label for="password"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="Password"><path d="M24,4H8A4,4,0,0,0,4,8V24a4,4,0,0,0,4,4H24a4,4,0,0,0,4-4V8A4,4,0,0,0,24,4Zm2,20a2,2,0,0,1-2,2H8a2,2,0,0,1-2-2V8A2,2,0,0,1,8,6H24a2,2,0,0,1,2,2ZM19.819,12.421A3.572,3.572,0,0,0,16.4,15H9.6a1,1,0,0,0-1,1v2.579a1,1,0,0,0,2,0V17h1v1.579a1,1,0,0,0,2,0V17h2.8a3.572,3.572,0,1,0,3.419-4.579Zm0,5.158A1.579,1.579,0,1,1,21.4,16,1.581,1.581,0,0,1,19.819,17.579Z"  class="color000000 svgShape"></path></svg> <input type="password" name="password" required placeholder="Password"></label>
            <div class="btns"><input class="cbtn" type="submit" name="submit" value="Create"></div>
        </form>
      <br>
    <center>Already Have An Account ?  <a href="login.php" class="link"> Login </a></center>
</body>
</html>
    <?php
  }
?>
