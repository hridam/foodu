<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="refresh" content="3">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>kitchen page</title>
</head>

<body>
  <div class="container">
    <table border="1">
      <tr>
        <?php
        include("dbcon.php");
        $no_of_table = 'SELECT * FROM orders';
        $numTable = mysqli_query($con, $no_of_table);
        $numberOfrows = mysqli_num_rows($numTable);
        $i = 1;
        if ($numberOfrows != null) {


          while ($i <= $numberOfrows) {
            if ($i % 3 == 1) {
              echo '</tr><tr>';
            }
            echo '
        <td>
       <form action="kitchen.php" method="POST">
        <input type="hidden" name="tableno" id="' . $i . '" value=' . $i . '>
        
        <button class="btn btn-primary float-right " > RECEIVED </button>
        </form>
        Table : ' . $i . '
        <table class="table ">
          <thead>
            <tr class="table-primary">
              <th scope="col">NAME</th>
              <th scope="col">QTY</th>
              <th scope="col">TABLE_NO</th>
              <th scope="col">ORDER_STAT</th>
            </tr>
     
        ';

            $sql = " SELECT * FROM orders WHERE table_no = $i ";
            $result = mysqli_query($con, $sql);
            if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
                if (isset($row['order_name'])) {
                  if ($row['Order_stat'] == 'received') {
                    echo '
                <tr class="bg-success">';
                    echo '
                <td>' . $row['order_name'] . '</td>
                <td>' . $row['order_qty'] . '</td>
                <td>' . $row['table_no'] . '</td>
                <td>' . $row['Order_stat'] . '</td>
               
              </tr>';
                  } else {
                    echo '
                <tr class="bg-danger">';
                    echo '
                <td>' . $row['order_name'] . '</td>
                <td>' . $row['order_qty'] . '</td>
                <td>' . $row['table_no'] . '</td>
                <td>' . $row['Order_stat'] . '</td>
               
              </tr>';
                  }
                }
               
              }
              echo '
          </thead>
          <tbody>
          </tbody>
        </table>
      
      </td>
          ';
            }
            $i++;
          }
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $tableno = $_POST['tableno'];
          echo $tableno;
          $up = "UPDATE `orders` SET Order_stat = 'received' WHERE table_no = $tableno ";
          $res = mysqli_query($con, $up);
          if ($res) {
            echo 'updated';
            // header('location:kitchen.php?updated=true');

            die;
          } else {
            echo 'wrong query';
          }
        }
        ?>

      </tr>
    </table>
  </div>




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
