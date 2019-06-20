<?php

require 'server.php';
//include 'fetch.php';
?>
<?php
// get channel values if selected
$search_text = $_SESSION["channel"];
$search_text_market = $_SESSION["market"];

if(isset($_POST["selected_trademark"])){

$data = array();
   $id = join("','", $_POST["selected_trademark"]);
   $query = "
    SELECT * FROM third_level_category_2 WHERE Trademark IN ('".$id."') group by Trademark
   ";
    $statement = mysqli_query($db,$query);
    $result = mysqli_fetch_all($statement, MYSQLI_ASSOC);
    foreach($result as $row){
     $data[]= $row["Trademark"];
    }
 $search_text_trademark = "'". implode("','", $data) ."'";
 $_SESSION["trademark"]=$search_text_trademark;

$query_data ="
 SELECT Channel ,Region ,Country ,Trademark ,DATE_FORMAT(Date, '%m/%d/%Y') AS Date,Value FROM media_i WHERE Channel IN (".$search_text.") AND Country IN (".$search_text_market.") AND Trademark IN (".$search_text_trademark.") AND Value <> 0";
}
else
{

 $query_data = "SELECT Channel ,Region ,Country ,Trademark ,DATE_FORMAT(Date, '%m/%d/%Y') AS Date, Value FROM MEDIA_I WHERE Value <> 0";
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