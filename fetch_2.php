<?php
require 'server.php';
?>
<?php

if(isset($_POST["selected"]))
{  $data = array();
   $id = join("','", $_POST["selected"]);
   $query = "
    SELECT * FROM first_level_category_1 WHERE Channel IN ('".$id."') group by Channel
   ";
    $statement =mysqli_query($db,$query);
    $result = mysqli_fetch_all($statement, MYSQLI_ASSOC);
    foreach($result as $row){
     $data[]= $row["Channel"];
    }
 $search_text= "'". implode("','", $data) ."'";
 $_SESSION["channel"]=$search_text;
// echo $search_text;
 
 $query_data ="
 SELECT Channel ,Region ,Country ,Trademark ,DATE_FORMAT(Date, '%m/%d/%Y') AS Date,Value FROM MEDIA_I WHERE Channel IN (".$search_text.") AND Value <> 0";
 
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
