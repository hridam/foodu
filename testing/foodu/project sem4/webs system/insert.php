<!DOCTYPE html>
<html>
<head>
	<title>image upload</title>
	<link rel="stylesheet" type="text/css" href="insertstyle.css">
	<style>
		
	</style>
</head>
<body>
<div>
<table border="1">
        <tr>
            <th>Cat_ID</th>
            <th>Cat_Name</th>
        </tr>
        <?php
        include('dbcon.php');

        $cat = "SELECT * FROM cate";
        $rec = mysqli_query($con, $cat);
        $tt = mysqli_num_rows($rec);
        while ($rr = mysqli_fetch_assoc($rec)) {
            echo '
<tr>
<td>' . $rr['cat_id'] . '</td>
<td>' . $rr['cate_name'] . '</td>
</tr>';
        }
        ?>
    </table>
</div>
	<div id="content">
	<form method="post" action="" enctype="multipart/form-data">
			<input type="hidden" name="size" value="1000000">
			<div>
				Enter the Product name : <input type="file" name="image">
			</div><br>
			<div>
			Enter the Product name : <input type="text" name="pname" placeholder="Enter the product name">
			</div><br>
			<div>
				Enter the price of an product : <input type="number" placeholder="place the price of an item" name="price">
			</div><br>
			<div>
				Food Description : <textarea name="text" cols="40" placeholder="Derscription of food..."></textarea>
			</div><br>
			<div>
				Enter the Product No : <input type="text" placeholder="enter the product number" name="cat_id">
			</div><br>
			<div>
				<input type="submit" name="upload" value="Upload The Item">
			</div>
		</form>
	</div>
</body>
</html>
<?php

include ('dbcon.php');

	 if(isset($_POST['upload'])){
	 	$target = "C:/wamp64/www/project sem4/".basename($_FILES['image']['name']);

	 	include("dbcon.php");
		 $pnames = $_POST['pname'];
		 $image = $_FILES['image']['name'];
	 	$price = $_POST['price'];
	 	$text = $_POST['text'];
		$cate = $_POST['cat_id'];

	 	$sql = "INSERT INTO `menu`(`Name`, `Image`, `Price`, `Description`, `cate_id`) VALUES ('$pnames', '$image', '$price', '$text', '$cate')";	
	 	mysqli_query($con, $sql);

	 	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
	 		$msg = "image uploaded successfully";
	 	}else{
	 		$msg = "there was a problem uploading";
	 	}
	 }

	 
?>
