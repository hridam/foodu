<!-- <?php
include ('dbcon.php');
$a = $_GET['q'];
// $a = 'Coffee';
$sql = "SELECT cate_name FROM cate where cate_name LIKE '%$a%'";
$rr = mysqli_query($con, $sql);
if ($rr){
    while ($a = mysqli_fetch_assoc($rr)){
        echo $a['cate_name'];
    }
    echo '';
}
else{
    echo 'gg';
}
?> -->