<?php

require 'server.php';
//include 'fetch.php';
?>
<?php
// get channel values if selected
$search_text = $_SESSION["channel"];

if(isset($_POST["selected_market"])){

$data = array();
   $id = join("','", $_POST["selected_market"]);
   $query = "
    SELECT * FROM second_level_category WHERE Market IN ('".$id."') group by Market
   ";
    $statement = mysqli_query($db,$query);
    $result = mysqli_fetch_all($statement, MYSQLI_ASSOC);
    foreach($result as $row){
     $data[]= $row["Market"];
    }
 $search_text_market= "'". implode("','", $data) ."'";
 $_SESSION["market"]=$search_text_market;
$query_data ="
 SELECT Channel ,Region ,Country ,Trademark ,DATE_FORMAT(Date, '%m/%d/%Y') AS Date,Value FROM trp_standard WHERE Channel IN (".$search_text.") AND Country IN (".$search_text_market.") AND Value <> 0";
}
else
{

 $query_data = "SELECT Channel ,Region ,Country ,Trademark ,DATE_FORMAT(Date, '%m/%d/%Y') AS Date, Value FROM trp_standard WHERE Value <> 0";
}

$statement = mysqli_query($db,$query_data);
$result = mysqli_fetch_all($statement, MYSQLI_ASSOC);


$output = '';

 foreach($result as $row)
 {
  $output .= '
  <tr>
   <td>'.$row["Channel"].'</td>
   <td>'.$row["Region"].'</td>
   <td>'.$row["Country"].'</td>
   <td>'.$row["Trademark"].'</td>
   <td>'.$row["Date"].'</td>
   <td>'.$row["Value"].'</td>
  </tr>
  ';
 }


echo $output;
//echo $search_text; 


?>
