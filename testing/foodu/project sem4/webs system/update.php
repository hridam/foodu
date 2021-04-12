<!DOCTYPE html>
<html>

<head>
    <title>Update the data</title>
</head>
<style>
    body {
        background-color: palevioletred;
    }
</style>

<body>
    <h1>Update Page</h1>
    <!-- <?php

    include('dbcon.php');

    if (isset($_POST['upload'])) {
        $target = "C:/wamp64/www/project sem4/" . basename($_FILES['image']['name']);

        include("dbcon.php");
        $pnames = $_POST['pname'];
        $image = $_FILES['image']['name'];
        $price = $_POST['price'];
        $Description = $_POST['text'];
        $cate_id = $_POST['cat_id'];

        $Update = "UPDATE `menu` SET `Name`= '" . $Name . "',`Image`= '" . $Image . "'`Price`= '" . $Price . "',`Description`= '" . $Description . "',`cate_id`= '" . $cate_id   . "'  WHERE `ID` = " . $_GET['id'];
       $fg = mysqli_query($con, $Update);
        if ($fg){
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "image uploaded successfully";
            } else {
                $msg = "there was a problem uploading";
            }
        }
        else{
            echo "fial";
        }

    }
    ?> -->
    <?php
    include("dbcon.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Name = $_POST['pname'];
        $image = $_FILES['image']['name'];
        $Price = $_POST['price'];
        $Description = $_POST['text'];
        $cate_id = $_POST['cat_id'];
        $Update = "UPDATE `menu` SET `Name` = '.$Name.', `Image` = '.$image.', `Price` = '.$Price.', `Description` = '.$Description.', `cate_id` = '.$cate_id.' WHERE `menu`.`ID` = ".$_GET['id'];
        $result = mysqli_query($con, $Update);

        if ($result) {
            echo 'data update sucessful';
            // echo "Image " . $Image;
        } else {
            echo 'date is not update sucessfully';
        }
        // header('location: update.php');
    }
    ?>
</body>

</html>
<div class="container">
    <div class="formdiv">
        <table class="table">
    </div>

    <?php
    include("dbcon.php");
    if (isset($_GET['id'])) {
        $fgfgf = "SELECT * from `menu` where `ID` = '" . $_GET['id'] . "' ";
        $result = mysqli_query($con, $fgfgf);
        while ($row = mysqli_fetch_array($result)) {
            echo '
            <form method = "POST" enctype="multipart/form-data">
    
            <lable>Product Name</label>
            <input type = "text" name = "pname" value = "' . $row['Name'] . '" id="pname" placeholder = "Enter the Produxt Name"> <br><br>
    
            <input type="hidden" name="size" value="1000000">
			<div>
				Enter the Product name : <input type="file" name="image">
			</div><br>
            <label>Price</label>
            <input type = "number" name = "price" value = "' . $row['Price'] . '" id = "price" placeholder = "Enter the price"><br><br>
    
            <label>Description</label>
            <textarea name="text" id="text"  cols="40" placeholder="Derscription of food...">' . $row['Description'] . '</textarea><br><br>
    
            <label>cate_id</label>
            <input type="text" id = "cat_id" value = "' . $row['cate_id'] . '" placeholder="enter the product number" name="cat_id"><br><br>
    
            <input type = "submit" vaue = "Update">
            </from>
            ';
        }
    }

    ?>