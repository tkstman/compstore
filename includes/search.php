<?php
include_once('db_connx.php');

if( !empty(htmlspecialchars ($_POST['usearch'])) )
{

  //Create an insert statment for the account that is being registered. Then the account id is inserted in to the customer table.
  $stmt = "CALL search(?)";

  //execute the insert statement from above
  if($prepstmt = $connx->prepare($stmt))
  {
    $usrh =htmlspecialchars($_POST['usearch']);
    if($prepstmt->bind_param("s",$usrh))
    {
      if($prepstmt->execute())
      {
        //if insert was successfully executed we echo success
        $prepstmt->bind_result($res);
        $prepstmt->fetch();

        if($res>1)
        {
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
