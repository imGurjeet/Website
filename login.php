<?php
if(isset($_POST['submit']))
  {
    include("connection/connection.php");    
    
    $username=$_POST['email'];
    $password=$_POST['password'];

    $a="SELECT * from users where Username='$username' and Password = '$password';";
    $result=$conn->query($a);
    $row=$result->fetch_assoc();

    if($row['Username']==="$username" && $row['Password']==="$password")
    {    
        $uid=$row['UID'];
        setcookie('UID',$uid,time()+3600);
        setcookie('Username',$username,time()+3600);
        setcookie('Password',$password,time()+3600);   
        header( "refresh:0;url=welcome.php");
    }
    else
    {
        header( "refresh:0;url=wrong.php");
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body id="body">
<div class="box">
    <div class="box1"></div>
    <div class="box2"></div>
</div>
    <h1>Welcome Back !</h1>
        <form method="post">
            <label for="email"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="Email" required ><path fill="#00ffe1" d="M53.42 53.32H10.58a8.51 8.51 0 0 1-8.5-8.5V19.18a8.51 8.51 0 0 1 8.5-8.5h42.84a8.51 8.51 0 0 1 8.5 8.5v25.64a8.51 8.51 0 0 1-8.5 8.5ZM10.58 13.68a5.5 5.5 0 0 0-5.5 5.5v25.64a5.5 5.5 0 0 0 5.5 5.5h42.84a5.5 5.5 0 0 0 5.5-5.5V19.18a5.5 5.5 0 0 0-5.5-5.5Z" class="color222222 svgShape"></path><path fill="#00ffe1" d="M32 38.08a8.51 8.51 0 0 1-5.13-1.71L3.52 18.71a1.5 1.5 0 1 1 1.81-2.39L28.68 34a5.55 5.55 0 0 0 6.64 0l23.35-17.68a1.5 1.5 0 1 1 1.81 2.39L37.13 36.37A8.51 8.51 0 0 1 32 38.08Z" class="color222222 svgShape"></path><path fill="#00ffe1" d="M4.17 49.14a1.5 1.5 0 0 1-1-2.62l18.4-16.41a1.5 1.5 0 0 1 2 2.24L5.17 48.76a1.46 1.46 0 0 1-1 .38zm55.66 0a1.46 1.46 0 0 1-1-.38l-18.4-16.41a1.5 1.5 0 1 1 2-2.24l18.39 16.41a1.5 1.5 0 0 1-1 2.62z" class="color222222 svgShape"></path></svg> <input type="email" name="email" placeholder="E-Mail" ></label>
            <label for="password"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="Password" required ><path d="M24,4H8A4,4,0,0,0,4,8V24a4,4,0,0,0,4,4H24a4,4,0,0,0,4-4V8A4,4,0,0,0,24,4Zm2,20a2,2,0,0,1-2,2H8a2,2,0,0,1-2-2V8A2,2,0,0,1,8,6H24a2,2,0,0,1,2,2ZM19.819,12.421A3.572,3.572,0,0,0,16.4,15H9.6a1,1,0,0,0-1,1v2.579a1,1,0,0,0,2,0V17h1v1.579a1,1,0,0,0,2,0V17h2.8a3.572,3.572,0,1,0,3.419-4.579Zm0,5.158A1.579,1.579,0,1,1,21.4,16,1.581,1.581,0,0,1,19.819,17.579Z" fill="#00ffe1" class="color000000 svgShape"></path></svg> <input type="password" placeholder="Password"  name="password" ></label>
           <div class="btns"> <input class="btn" type="submit" name="submit" value="Login"></div>
        </form>
        <br>
        <center>Don't Have An Account ?<a href="reg-form.php" class="link"> Sign Up </a></center>
    </body>
</html>