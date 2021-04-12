<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <meta http-equiv="refresh" content="1"> -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>kitchen page</title>
</head>

<body>
  <table border="1">
    <tr>
      <td>
      Table : 1
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th scope="col">NAME</th>
              <th scope="col">QTY</th>
              <th scope="col">TABLE_NO</th>
              <th scope="col">ORDER_STAT</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include("dbcon.php");
            $sql = " SELECT * FROM orders WHERE table_no = 1 ";
            $result = mysqli_query($con, $sql);
            if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '
              <tr>
              <td>' . $row['order_name'] . '</td>
              <td>' . $row['order_qty'] . '</td>
              <td>' . $row['table_no'] . '</td>
              <td>' . $row['Order_stat'] . '</td>
              <td>
              <form method="POST">
              <input type="hidden" name="received" value="' . $row['order_id'] . '" id="' . $row['order_id'] . '"/>
              <button onclick="order_rec(' . $row['order_id'] . ')"> RECEIVED </button>
              </form>
              </td>
            </tr>';
              }
            }

            extract($_POST);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $received;

              $up = "UPDATE `orders` SET Order_stat = 'received' WHERE order_id = 1 ";
              $res = mysqli_query($conn, $up);
              if ($res) {
                echo 'updated';
              } else {
                echo 'wrong query';
              }
            }
            ?>
          </tbody>
        </table>
      </td>
  </table>
  </table>

  <script>
    function order_rec(b) {
      var r = document.getElementById(b).value;
      r.submit();
      console.log(r);
    }
  </script>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>