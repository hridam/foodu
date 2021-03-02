<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <title>Hello, world!</title>
  <style>
  input[type='text']{
    width: 10%;
    text-align: center;
  }
  body{
    background-image: url('hell.jpg');
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
  }
  </style>
</head>

<body>
  <div class="container">
    <h1 class="text-center text-white">menu</h1>
    <br>
    <div class="container  ">

    <?php
    $con = mysqli_connect("localhost", "root", "", "foodu");
    if ($con) {
      // echo 'connection';
      $q = "select * from cate";
      $result = mysqli_query($con, $q);
      if ($result) {
        // echo 'query suces';
        while ($row = mysqli_fetch_assoc($result)) {
          echo '
         
         <h1 class="m-5 text-white">' . $row['cate_name'] . '</h1>';
          $menuquery = 'SELECT * FROM menu where cate_id='.$row['cat_id'];
          $menuResult = mysqli_query($con,$menuquery);
          if($menuResult){
            // echo 'nested chalyo';
          }
          else{
            // echo 'not connected';
          }
          while ($rows = mysqli_fetch_assoc($menuResult)) {
            echo '
         
           <div class="card mb-3 float-right" style="max-width: 540px;">
             <div class="row g-0">
               <div class="col-md-4">
                 <img src="' . $rows['Image'] . '" alt="..." width="100%">
               </div>
               <div class="col-md-8">
                 <div class="card-body">
                   <h5 class="card-title ">' . $rows['Description'] . '</h5>
                   <p class="card-text"><small class="text-muted">' . $rows['Description'] . '</small></p>
                   <div class="text-end">
                     <p class="card-text"><small class="text-muted">' . $rows['Price'] . '</small></p>
                     <a href="">+ ADD to cart</a>
                   </div>
                   <div class="qty">
                     <button onclick="increase('.$rows['ID'].')">+</button>
                     <input type="text" width="5" value="1"  id="'.$rows['ID'].'" >
                     <button onclick="decrease('.$rows['ID'].')">-</button>
     
                   </div>
     
                 </div>
               </div>
             </div>
           </div>


           
        
         ';
   
          }
        }
      } else {
        echo ' fuck you ';
      }
    } else {
      echo "not connected";
    }
    ?>

         </div>

  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  <script>
    function increase(id) {

      var x = document.getElementById(id).value;
      console.log(x);
      var a = parseInt(x);
      if(a<5){
        a++;
      //   console.log(a);
      document.getElementById(id).value = a;
      }
      
     
    }

    function decrease(id) {

      var x = document.getElementById(id).value;
      console.log(x);
      var a = parseInt(x);
      if(a>1){
        a--;
      //   console.log(a);
      document.getElementById(id).value = a;
    
      }
      
      
    }
  </script>
</body>

</html>
