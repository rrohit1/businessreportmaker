<?php
require 'server.php';
?>
<?php
$search_text = $_SESSION["channel"];
$search_text_market = $_SESSION["market"];
$search_text_trademark = $_SESSION["trademark"];
if(isset($_POST["Result"]))
{  
 $radioVal = $_POST['Result'];
 $_SESSION["period"]= $radioVal;
 if($radioVal == 'Week'){
$query_data ="
 SELECT Channel ,Region ,Country ,Trademark ,DATE_FORMAT(Date, '%m/%d/%Y') AS Date,Value FROM TRP_STANDARD WHERE Channel IN (".$search_text.") AND Country IN (".$search_text_market.") AND Trademark IN (".$search_text_trademark.") AND Value <> 0";
 }
else{
    $query_data ="
 SELECT Channel ,Region ,Country ,Trademark ,Year(Date) AS Date, sum(Value) as Value FROM TRP_STANDARD WHERE Channel IN (".$search_text.") AND Country IN (".$search_text_market.") AND Trademark IN (".$search_text_trademark.") AND Value <> 0 
 group by Channel ,Region ,Country ,Trademark ,Metric ,Year(Date)";
}}
else
{

 $query_data = "SELECT Channel ,Region ,Country ,Trademark ,DATE_FORMAT(Date, '%m/%d/%Y') AS Date, Value FROM TRP_STANDARD WHERE Value <> 0";
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
