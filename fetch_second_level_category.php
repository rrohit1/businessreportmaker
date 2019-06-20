<?php

//fetch_second_level_category.php

require('server.php');
?>
<?php
if(isset($_POST["selected"])){
    $id = join("','", $_POST["selected"]);
    $query = "
    SELECT * FROM second_level_category WHERE Channel IN ('".$id."') group by Market
    ";
    $statement =mysqli_query($db,$query);
    $result = mysqli_fetch_all($statement, MYSQLI_ASSOC);
    $output = '';
    foreach($result as $row)   
    {
        $output .= '<option value="'.$row["Market"].'">'.$row["Market"].'</option>';
    }
    echo $output;
}
else if(isset($_POST["all"])){
     $query = "
    SELECT * FROM second_level_category";
    $statement =mysqli_query($db,$query);
    $result = mysqli_fetch_all($statement, MYSQLI_ASSOC);
    $output = '';
    foreach($result as $row)   
    {
        $output .= '<option value="'.$row["Market"].'">'.$row["Market"].'</option>';
    }
    echo $output;
}
?>