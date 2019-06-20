<?php
require 'server.php';
?>
<?php
if(isset($_POST["Result"]))
{  
 $metric = $_POST['metric'];
 $_SESSION["metric"] = $metric;
}
?>
