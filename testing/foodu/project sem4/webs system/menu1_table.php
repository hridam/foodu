<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Menu Table</title>
</head>

<body>
    <br>
    <h1 style="text-align:center;">Here is the Menu Table</h1>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Cate_id</th>
            </tr>
        </thead>

        <?php
        include('dbcon.php');

        $cat = "SELECT * FROM menu";
        $rec = mysqli_query($con, $cat);
        $tt = mysqli_num_rows($rec);
        while ($rr = mysqli_fetch_assoc($rec)) {
            echo '
            <tbody>
    <tr>
      <th scope="row">' . $rr['ID'] . '</th>
      <td>' . $rr['Name'] . '</td>
<td>' . $rr['Image'] . '</td>
<td>' . $rr['Price'] . '</td>
<td>' . $rr['Description'] . '</td>
<td>' . $rr['cate_id'] . '</td>
<td>
        <a class="btn btn-primary" href = "delete_menu.php?id='.$rr['ID'].'">    
         Delete
         </a>
      </td>
    </tr>
    </tbody>
               ';
        }
        ?>
    </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
