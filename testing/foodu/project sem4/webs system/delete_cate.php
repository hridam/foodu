<?php
include ('dbcon.php');
$a = $_GET['id'];

$df = "DELETE FROM cate WHERE cat_id = $a";
if (mysqli_query($con, $df)){
    header("location: cate1_table.php");
}
else{
    echo "Something went wromg";
}
?>