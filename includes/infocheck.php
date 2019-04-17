<?php
session_start();
if(isset($_SESSION['ulogin']))
{

  include_once('db_connx.php');
  $uname = htmlspecialchars($_SESSION['ulogin']);

  if( isset($_POST['usku']))
  {
    //check to see that the user has a card and a shipping address
    echo 'sku sent';
    exit();

    $qry = 'select * from account where username = "'. $uname .'"';
    $card=1;
    $addr=1;

    if($result = $connx->query($qry))
    {

      if($result->num_rows ==1)
      {
        $myrow = $result->fetch_array(MYSQLI_ASSOC);
        if($myrow['cardNumb'] === NULL|| $myrow['cardExpDate'] === NULL)
        {
          $card=0;
        }

        if($myrow['shippingAddr'] === NULL)
        {
          $addr=0;
        }
      }
    }

    if($card == 0 && $addr == 0 )
    {
      echo 'card and address needed';
      exit();
    }
    else if($card == 0)
    {
      echo 'card needed';
      exit();
    } else if($addr == 0 )
    {
      echo 'address needed';
      exit();
    }
    else if($card==1 && $addr==1)
    {
      echo 'card and address are on file';
      exit();
    }
    //if not the prompt user to enter the info needed
  }

  if(isset($_POST['uaddr']))
  {
    $adr = htmlspecialchars ($_POST['uaddr']);
    $upAddr = 'UPDATE account SET account.shippingAddr = "'. $adr .'" WHERE account.username ="'.$uname .'"';

    if($result = $connx->query($upAddr))
    {
      if($result->num_rows ==1)
      {
        echo "Address Updated Successfully";
      }
    }

  }

  if(isset($_POST['ucardname']) && isset($_POST['ucardnum']) && isset ($_POST['udate']))
  {

    $ucardnum = htmlspecialchars ($_POST['ucardnum']);
    $ucardname = htmlspecialchars ($_POST['ucardname']);
    $udate = htmlspecialchars ($_POST['udate']);
    $upAddr = 'UPDATE account SET account.cardNumb = "'. $ucardnum.'", account.cardExpDate ="'. date( "Y-m-d", strtotime($udate) ) .'" WHERE account.username ="'.$uname .'"';

    if($result = $connx->query($upAddr))
    {
      if($connx->insert_id >0)
      {
        //update customer table
        $pieces = explode(" ", $ucardname);
        $fname =$pieces[0] ;
        $lname = "";
        if(count($pieces) >1)
        {
          $lname =$pieces[1] ;
        }
        $upCust = 'UPDATE customer SET customer.cFname = "'. $fname.'", customer.cLname ="'. $lname .'" WHERE customer.accountID ='.$connx->insert_id ;
        if($connx->query($upCust))
        {
          echo "Card Information Updated Successfully";
        }
      }
    }

  }

}
else
{
  header('location: signin.php');
}


 ?>
