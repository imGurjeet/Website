<?php 
  if(isset($_COOKIE['Username']) && isset($_COOKIE['Password']))
  {
    header("location:welcome.php");
  }
  else
  {
    header("location:login.php");
  }
 ?>
