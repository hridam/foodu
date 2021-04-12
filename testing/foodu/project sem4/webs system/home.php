<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-sacle=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compactible" content="ie=edge">
	<title>Foodu Resturent</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<script src="https://unpkg.com/scrollreveal"></script>
	<link rel="stylesheet" href="styles.css">
	
</head>
<!-- <?php
$a = $_GET['table'];
echo $a;
?> -->
<body>

	<header>
		<div class="container">
			<nav class="nav">
				<div class="menu-toggle">
					<i class="fas fa-bars"></i>
					<i class="fas fa-times"></i>
				</div>
				<a href="home.html" class="logo"><img src="project sem4/final logo.png" alt=""></a>
				<ul class="nav-list"> 
					<li class="nav-item">
						<a href="home.html" class="nav-link active">HOME</a>
					</li>
					<li class="nav-item">
						<a href="" class="nav-link">MENU</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<section class="hero" id="hero">
		<div class="container">
			<h2 class="sub-headline">
				<span class="first-letter">W</span>elcome
			</h2>
			<h1 class="headline">Foodu Restaurant</h1>
			<div class="headline-description">
				<div class="separator">
					<div class="line line-left"></div>
					<div class="asterisk"><i class="fas fa-asterisk"></i></div>
					<div class="line line-right"></div>
				</div>
				<div class="single-animation">
					<h5>ready to open</h5>
					<a href="menu.php?table=<?php echo $a;?>" class="btn cta-btn">CLick for Menu</a>
				</div>
			</div>
		</div>
	</section>
	<script src="main.js"></script>

</body>
</html>
