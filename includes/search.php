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
    $usrh = '%' . $usrh . '%';
    if($prepstmt->bind_param("s",$usrh))
    {
      if($prepstmt->execute())
      {
        //if insert was successfully executed we echo success
        $res = $prepstmt->get_result();
        $val='
        <div class="row">
          <div class="col">SKU</div>
          <div class="col">Model
          </div>
          <div class="col"> Screen
          </div>
          <div class="col"> RAM
          </div>
          <div class="col">HDD
          </div>
          <div class="col">Colour
          </div>
          <div class="col">Res
          </div>
          <div class="col">Price
          </div>
          <div class="col">Category
          </div>
          <div class="col">Brand
          </div>
          <div class="col">Processor
          </div>
          <div class="col">
              <button>Purchase</button>
          </div>
        </div>';

        while($row = $res->fetch_assoc())
        {
          $val= '
          <div class="row">
            <div class="col">'.
                $row['SKU'] .
            '</div>
            <div class="col">
                ' .$row["modelNo"] .'
            </div>
            <div class="col"> '.
                $row['screenSize'].'
            </div>
            <div class="col">'.
                $row['memoryMB'].'
            </div>
            <div class="col">'.
                $row['hddGB'] .'
            </div>
            <div class="col">'.
                $row['colour'].'
            </div>
            <div class="col">'.
                $row['resolution'].'
            </div>
            <div class="col">'.
                $row['price'].'
            </div>
            <div class="col">'.
                $row['categoryName'].'
            </div>
            <div class="col">'.
                $row['brandName'].'
            </div>
            <div class="col">'.
                $row['processorName'].'
            </div>
            <div class="col">
                <button>Purchase</button>
            </div>
          </div>';
        }

        echo $val;//"Failed";
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
