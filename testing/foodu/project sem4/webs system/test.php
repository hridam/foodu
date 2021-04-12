<?php
include 'dbcon.php';
// $sql = "SELECT cate_name FROM cate where cate_name LIKE ".$_GET['q'];
// $rr = mysqli_query($con, $sql);
// if ($rr) {
//   while ($a = mysqli_fetch_assoc($rr)) {
//     if ($a == NULL){
//       echo 'Product not found';
//     }
//     else{
//       echo $a['cate_name'];
//     }
// }
//   echo '';
// } else {
//   // echo 'gg';
// }
if (isset($_GET['q'])) {
  $q = $_GET['q'];
  // echo 'this is from php '. $q;
  include("dbcon.php");
  if ($con) {
    // echo 'connection';
    $q = "select * from cate where cate_name like '%" . $q . "%'";
    $result = mysqli_query($con, $q);
    if ($result) {
      // echo 'in the cate section';
      while ($row = mysqli_fetch_assoc($result)) {
        echo '
                 
                 <br>
                 <br>
                 <hr class="bg-white">
                 <h1 class="m-5 text-white">' . $row['cate_name'] . '</h1>';
        $menuquery = 'SELECT * FROM menu where cate_id=' . $row['cat_id'];
        $menuResult = mysqli_query($con, $menuquery);
        if ($menuResult) {
          //   echo 'nested chalyo';
          while ($rows = mysqli_fetch_assoc($menuResult)) {
            echo '
           
             <div class="card mb-3 float-start m-1" style="max-width: 540px; ">
               <div class="row g-0" >
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
                       <input type="text" width="5" value="1"  id="' . $rows['ID'] . '" readonly>
                       <button onclick="decrease(' . $rows['ID'] . ')">-</button>
       
                     </div>
       
                   </div>
                 </div>
               </div>
             </div>
  
             
          
           ';
          }
        } else {
          echo 'not connected';
        }
      }
    } else {
      echo 'error';
    }
  }
}
