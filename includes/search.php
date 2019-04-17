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
        $val='<table class="table table-sm">
        <thead>
          <tr class="row">
            <th id="sku" class="col  border bg-light">SKU</th>
            <th id="model" class="col  border bg-light">Model
            </th>
            <th id="Screen" class="col  border bg-light"> Screen
            </th>
            <th id="RAM" class="col  border bg-light"> RAM
            </th>
            <th id="HDD" class="col  border bg-light">HDD
            </th>
            <th id="Colour" class="col  border bg-light">Colour
            </th>
            <th id="Res" class="col  border bg-light">Res
            </th>
            <th id="Price" class="col  border bg-light">Price
            </th>
            <th id="Category" class="col  border bg-light">Category
            </th>
            <th id="Brand" class="col  border bg-light">Brand
            </th>
            <th id="Branch" class="col  border bg-light">Branch
            </th>
            <th id="Processor" class="col  border bg-light">Processor
            </th>
            <th id="purch" class="col  border bg-light">

            </th>
          </tr>
        </thead>
        <tbody>
          ';

        while($row = $res->fetch_assoc())
        {
          $val= $val.'
          <tr class="row">
            <td headers="sku" class="col  border bg-light">'.
                $row['SKU'] .
            '</td>
            <td headers="model" class="col  border bg-light">
                ' .$row["modelNo"] .'
            </td>
            <td headers="Screen" class="col  border bg-light"> '.
                $row['screenSize'].'
            </td>
            <td headers="RAM" class="col  border bg-light">'.
                $row['memoryMB'] .'GB' .'
            </td>
            <td headers="HDD" class="col  border bg-light">'.
                $row['hddGB'] .'GB' .'
            </td>
            <td headers="Colour" class="col  border bg-light">'.
                $row['colour'].'
            </td>
            <td headers="Res" class="col  border bg-light">'.
                $row['resolution'].'
            </td>
            <td headers="Price" class="col  border bg-light">'.
                $row['price'].'
            </td>
            <td headers="Category" class="col  border bg-light">'.
                $row['categoryName'].'
            </td>
            <td headers="Brand" class="col  border bg-light" >'.
                $row['brandName'].'
            </td>
            <td headers="Branch" class="col  border bg-light" data-attrib="'.$row['branchNo'] .'">'.
                $row['branchName'].'
            </td>
            <td headers="Processor" class="col  border bg-light">'.
                $row['processorName'].'
            </td>
            <td headers="purch" class="col  border bg-light">
                <button class="buy">Buy</button>
            </td>
          </tr>';
        }
        $val = $val . '</tbody></table>';

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
