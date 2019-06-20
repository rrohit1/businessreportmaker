<?php
require 'server.php';
?>
<?php
$query = "
 SELECT Channel ,Region ,Country ,Trademark ,Metric ,DATE_FORMAT(Date, '%m/%d/%Y') AS Date,Value FROM Mexico 
 WHERE AND Value <> 0";

$statement = $db->query($query);

echo '$statement';

?>