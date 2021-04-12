<?php
include ('dbcon.php');
$a = $_GET['id'];

$df = "DELETE FROM menu WHERE ID = $a";
if (mysqli_query($con, $df)){
    header("location: menu1_table.php");
}
else{
    echo "Something went wromg";
}
?>