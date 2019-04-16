<?php
session_start();
if(isset($_SESSION['ulogin']))
{
  header('location: catalog.php');
}

include_once('db_connx.php');


if(!empty(htmlspecialchars($_POST['uemail'])) && !empty(htmlspecialchars($_POST['pword'])) )
{

  //Create an insert statment for the account that is being registered. Then the account id is inserted in to the customer table.
  $stmt = "CALL login(?,?)";

  //execute the insert statement from above
  if($prepstmt = $connx->prepare($stmt))
  {
    $uem =htmlspecialchars($_POST['uemail']);
    $upw =htmlspecialchars($_POST['pword']);
    if($prepstmt->bind_param("ss",$uem,$upw))
    {
      if($prepstmt->execute())
      {
        //if insert was successfully executed we echo success
        //$prepstmt->bind_result($res);
        $res=$prepstmt->get_result();

        if(count($res))
        {
          //create session
          $row = $res->fetch_assoc();
          $_SESSION["ulogin"] =$row["uname"];
          setcookie("uname",$row["uname"],strtotime('+30 days'),"/","","",TRUE);
          echo "Success";//. ;
        }
        else {
          echo "Failed";
        }
        exit();

      }
      else {
        echo "Execution Failed";
        exit();
      }

    }
    echo "Failed To Prep Statement";
    exit();
  }
  else {
    // We report that it failed
    echo $stmt;
    exit();
  }


}
else {
  echo "nothing sent";
}

?>
