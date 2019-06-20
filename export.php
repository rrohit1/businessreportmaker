<?php
require 'server.php';
?>
<?php  
      //export.php  

$search_text = $_SESSION["channel"];
$search_text_market = $_SESSION["market"];
$search_text_trademark = $_SESSION["trademark"];
$period=$_SESSION["period"];
 if(isset($_POST["export"]))  {
     if($period=='Week'){

     
 $query ="
 SELECT Channel ,Region ,Country ,Trademark, Metric ,DATE_FORMAT(Date, '%m/%d/%Y') AS Date, Value FROM TRP_STANDARD WHERE Channel IN (".$search_text.") AND Country IN (".$search_text_market.") AND Trademark IN (".$search_text_trademark.") AND Value <> 0";
     }
 else
 {
 $query ="
 SELECT Channel ,Region ,Country ,Trademark, Metric ,Year(Date) AS Date, sum(Value) as Value FROM TRP_STANDARD WHERE Channel IN (".$search_text.") AND Country IN (".$search_text_market.") AND Trademark IN (".$search_text_trademark.") AND Value <> 0 group by Channel ,Region ,Country ,Trademark ,Metric ,Year(Date)";
 }
 }
     else
     {
    $query = "SELECT Channel ,Region ,Country ,Trademark ,Metric , DATE_FORMAT(Date, '%m/%d/%Y') AS Date, Value FROM trp_standard WHERE Value <> 0";
     }
 
     //$statement = $db->query($query);
    {   
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Channel', 'Region', 'Country', 'Trademark', 'Metric', 'Date', 'TRP Standard'));  
      //$query = "SELECT * from Mexico WHERE Value <> 0";  
      $result = $db->query($query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
    }  
?>  