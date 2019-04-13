<?php

  $connx=new mysqli('localhost','root','','compustore');
   if(mysqli_connect_errno())
   {
     echo mysqli_connect_error();
     exit();
   }

?>
