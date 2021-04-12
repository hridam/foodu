 <?php
        //extrating all get data
        extract($_GET);
        
        echo $orders;
        $decoding = json_decode($orders, true);
        // // print_r( );
        print_r( $decoding);
        include('dbcon.php');
        if ($con) {
            $lengthOIfArray = sizeof($decoding);
            print_r($decoding);  
            // echo 'the length of the array'.$lengthOIfArray;
            $i = 0;
            while ($i < $lengthOIfArray) {
               $name= $decoding[$i]['name'];
               $price= $decoding[$i]['price'];
               $qty= $decoding[$i]['qty'];
               $total= $decoding[$i]['total'];
               $table= $decoding[$i]['table'];
                // echo $name;
                $sql ="INSERT INTO `orders` (`order_id`, `order_name`, `order_price`, `order_qty`, `order_total`, `table_no`, `Order_stat`) VALUES (NULL, '$name', '$price', '$qty', '$total', '$table', 'pemding') "; 
                echo '<br>'.$sql;
                $result = mysqli_query($con,$sql );
                if ($result) {
                    header("location: menu.php?table=$table");
                    echo 'inserted!!!!! boii';
                   } else {
                    echo  'boii wrong qury';
                }
                $i++;
            }
        }
        ?>  