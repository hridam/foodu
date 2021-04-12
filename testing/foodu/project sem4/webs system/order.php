<!DOCTYPE html>
<html>
<head>
	<title>Menu Of Foodu</title>
	<link rel="stylesheet" type="text/css" href="orderstyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <style type="text/css">
		body{
			/*background-image: url('');*/
			/*width: 100%;*/
	height: 100vh;
	background: url("C:/wamp64/www/project sem4/98.jpg") center no-repeat;
	background-size: cover;
	display: flex;
	text-align:  center;
		}
	</style> -->
</head>
<body>
	
	<section class="product-list">
		<h1>--MENU--</h1>
		<?php
	$con=mysqli_connect("localhost","root","","foodu");
	if(!$con){
		echo 'not connected';

	}
	else{
		echo '';
	}

	$query='select * from image';
	$result=mysqli_query($con,$query);
	if($result){
		while($row=mysqli_fetch_assoc($result)){
			echo '
			<div class="card" style="margin-top:10px">
			<div class="title">
			'.$row['Description'].'
			</div>
			<div class="image">
				<img src="'.$row['Image'].'">
			</div>
			<div class="text">
				'.$row['Price'].'
			</div>
			<div>
				<button class="cart-button" href="">OPEN</button>
		
			</div>
		</div>
		<br>
			';
		}
	}
	else{
		echo 'something went wrong!!!';
	}
	
	?>

	
		

</section>
</body>
</html>