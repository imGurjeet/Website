<?php
    if(isset($_COOKIE['Username']) && isset($_COOKIE['Password']))
    {
      setcookie("Username","",time()-3600);
      setcookie("Password","",time()-3600);
      setcookie("UID","",time()-3600);
      header("location:login.php");
    }
?>