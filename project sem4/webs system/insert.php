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
			<th>Item Name</th>
			<th>Product Number</th>
		</tr>
		<tr>
			<td>Coffee</td>
			<td>1</td>
		</tr>
		<tr>
			<td>Momo</td>
			<td>2</td>
		</tr>
		<tr>
			<td>Chowmin</td>
			<td>3</td>
		</tr>
		<tr>
			<td>Sausage</td>
			<td>4</td>
		</tr>
		<tr>
			<td>Cold Drink</td>
			<td>5</td>
		</tr>

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
				<input type="submit" name="upload" value="Upload Image">
			</div>
		</form>
	</div>
		<a href="destroy.php">logout</a>
</body>
</html>



<?php

session_start();
echo $_SESSION['email'];

	$msg = "";

	 if(isset($_POST['upload'])){
	 	$target = "C:/wamp64/www/project sem4/".basename($_FILES['image']['name']);

	 	include("dbcon.php");
		 $pnames = $_POST['pname'];
		 $image = $_FILES['image']['name'];
	 	$price = $_POST['price'];
	 	$text = $_POST['text'];
		$cate = $_POST['cat_id'];

	 	$sql = "INSERT INTO `menu`(`Name`, `Image`, `Price`, `Description`, `cate_id`) VALUES ('$pnames', '$image', '$price', '$text', '$cate')";	
	 	mysqli_query($db, $sql);

	 	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
	 		$msg = "image uploaded successfully";
	 	}else{
	 		$msg = "there was a problem uploading";
	 	}
	 }

	 
?>

