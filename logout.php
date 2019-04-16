<?php
  session_start();

  if(isset($_COOKIE["uname"]))
  {
    setcookie("uname",'',strtotime('-5 days'),'/');
  }
  session_unset();

  session_destroy();

  header('location: signin.php');
  
?>
