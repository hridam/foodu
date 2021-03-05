<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include('dbcon.php');
  // extract($_POST);
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $menudata = $_POST['menudata'];
    echo 'this is menu data' . $menudata;
  }
  // echo $_POST['name'] .$_POST['price'].$_POST['qty'].$_POST['total'];
  // echo 'data ayoo hai';

  // $sql = "INSERT INTO `orders` (`order_id`, `order_name`, `order_price`, `order_qty`, `order_total`) VALUES (NULL, '".$_POST['name']."', '".$_POST['price']."', '', '".$_POST['qty']."', '".$_POST['total']."');";
  // $result = mysqli_query($con, $sql);
  // if ($result) {
  //   echo 'insertedd';
  // } else {
  //   echo 'not inesetred';
  // }
}


?>
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
    input[type='text'] {
      width: 10%;
      text-align: center;
    }

    body {
      /* background-image: url('hell.jpg'); */
      background-position: center;
      background-size: cover;
      background-attachment: fixed;
      background-repeat: no-repeat;
    }

    .head {
      background: rgba(0, 0, 0, 0.5);
      height: 50%;
    }
  </style>
</head>

<body>
  <div class="head">
    <h1 class="text-center text-white">menu</h1>
    <button type="button" class="btn float-end" data-toggle="modal" data-target="#exampleModal">
      <svg xmlns="http:/ /www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart4 text-white mx-3" style="float:right" viewBox="0 0 16 16">
        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
      </svg>

    </button>


  </div>
  <div class="container">


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
            <section>
         <br>
         <br>
         <hr class="bg-white">
         <h1 class="m-5 text-white">' . $row['cate_name'] . '</h1>';
            $menuquery = 'SELECT * FROM menu where cate_id=' . $row['cat_id'];
            $menuResult = mysqli_query($con, $menuquery);
            if ($menuResult) {
              // echo 'nested chalyo';
            } else {
              // echo 'not connected';
            }
            while ($rows = mysqli_fetch_assoc($menuResult)) {
              echo '
         
           <div class="card mb-3 float-start m-1" style="max-width: 540px; ">
             <div class="row g-0">
               <div class="col-md-4">
                 <img src="images/' . $rows['Image'] . '" alt="..." width="100%" height="100%">+
               </div>
               <div class="col-md-8">
                 <div class="card-body">
                   <h5 class="card-title " id = "' . $rows['Name'] . '">' . $rows['Name'] . '</h5>
                   <p class="card-text"><small class="text-muted">' . $rows['Description'] . '</small></p>
                   <div class="text-end">
                    <p class="card-text" id="' . $rows['Price'] . '"><small class="text-muted">Rs. ' . $rows['Price'] . '</small></p>
<button onclick = "addCart(' . $rows['ID'] . ',';
              echo "'" . $rows['Name'] . "'";
              echo ', ' . $rows['Price'] . ')"> + ADD to cart </button>
                    
                    </div>
                   <div class="qty">
                     <button onclick="increase(' . $rows['ID'] . ')">+</button>
                     <input type="text" width="5" value="1"  id="' . $rows['ID'] . '" >
                     <button onclick="decrease(' . $rows['ID'] . ')">-</button>
     
                   </div>
     
                 </div>
               </div>
             </div>
           </div>

           
        
         ';
            }
            echo '<section>';
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
  <!-- Button trigger modal -- >


<!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ordered List</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <table border=1 width='100%' id='mytable'>
            <tr border=1>
              <th>name</th>
              <th>price</th>
              <th>qty</th>
              <th>total</th>
              <th>remove</th>
            </tr>
            <!-- <tr>
                <td border=1>
                  <p id="names"></p>

                </td>
                <td>
                  <p id="prices"></p>

                </td>
                <td>
                  <p id="qtys"></p>

                </td>
                <td>
                  <p id="total"></p>

                </td>

              </tr> -->
          </table>

          <br>




        </div>
        <div class="modal-footer">
          <form method="post" id='myform'>
            <input type="hidden" name="menudata" value="">
            <button type="button" class="btn btn-primary" onclick="order()">Order now</button>

          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
    function increase(id) {
      var x = document.getElementById(id).value;
      console.log(x);
      var a = parseInt(x);
      if (a < 25) {
        a++;
        //   console.log(a);
        document.getElementById(id).value = a;
      }


    }

    function decrease(id) {

      var x = document.getElementById(id).value;
      console.log(x);
      var a = parseInt(x);
      if (a > 1) {
        a--;
        //   console.log(a);
        document.getElementById(id).value = a;

      }


    }
    var clicked = 0;

    function addCart(qty, name, price) {
      var qtye = document.getElementById(qty).value;
      // console.log(qtye);
      // console.log(name);
      // console.log(price);
      var total = qtye * price;
      // console.log(total);
      // document.getElementById('names').value;
      table = document.getElementById('mytable');
      var row = table.insertRow(1);

      // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      var cell5 = row.insertCell(4)

      // Add some text to the new cells:
      cell1.innerHTML = name;
      cell2.innerHTML = price;
      cell3.innerHTML = qtye;
      cell4.innerHTML = total;
      cell5.innerHTML = '<input type="button" value="Delete" onclick="deleteRow(this)">';

      // console.log('this is a name'+namesdf);
      // document.getElementById('names').innerHTML = name;
      // document.getElementById('prices').innerHTML = price;
      // document.getElementById('qtys').innerHTML = qtye;
      // document.getElementById('total').innerHTML = total;

      // console.log('this is a '+test);



    }

    function filter(a) {
      tr = a.str_replace('<tr>', '')
      trr = tr.str_replace('</tr>', '')
      return trr
    }

    function order() {

      var lengthOfTable = table.rows.length;
      console.log('the length' + lengthOfTable);
      x = document.getElementById('mytable').rows[0].cells;
      // console.log(x[0])

      for (i = 1; i < lengthOfTable; i++) {
        console.log('this is on i loop')
        x = document.getElementById('mytable').rows[i].cells;
        for (j = 0; j <= 0; j++) {
          // console.log('this is'+x[0].innerHTML);
          item = [];
          item['name'] = x[0].innerHTML
          item['price'] = x[1].innerHTML
          item['qty'] = x[2].innerHTML
          item['total'] = x[3].innerHTML
          orders = [];

          // console.log(orders)

          // document.sampleForm.name.value = filter(x[0]);
          // document.sampleForm.price.value = filter(x[1])
          // document.sampleForm.qty.value =filter( x[2])
          // document.sampleForm.total.value = filter(x[3])

          // document.forms["sampleForm"].submit();

        }
        orders = item;
        console.log(orders)
        
          
          a = document.getElementById.value = JSON.stringify(orders);
          if (a) {
            console.log('this is a json file' + a);

          }
          // if(a!=null){
          //   document.getElementById("myform").submit();

          // }
        // }

        // else{
        //   console.log('null data')
        // }


      }
    }

    function deleteRow(r) {
      var i = r.parentNode.parentNode.rowIndex;
      document.getElementById("mytable").deleteRow(i);
    }
  </script>

</body>

</html>