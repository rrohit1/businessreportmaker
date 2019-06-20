<?php
//fetch_third_level_category.php
require('server.php');
?>
<?php

if(isset($_POST["selected_market"])){
    $id = join("','", $_POST["selected_market"]);
    $query = "
    SELECT Trademark FROM u_trp WHERE Country IN ('".$id."') group by Trademark
    ";
    $statement =mysqli_query($db,$query);
    $result = mysqli_fetch_all($statement, MYSQLI_ASSOC);
    $output = '';
    foreach($result as $row)   
    {
        $output .= '<option value="'.$row["Trademark"].'">'.$row["Trademark"].'</option>';
    }
    echo $output;
}

?>