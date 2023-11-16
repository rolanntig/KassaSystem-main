<?php
$endCart = array_count_values($_SESSION['cart']);             
            foreach($endCart as $key => $val){
                echo '<tr>' .'<td>'. $key.'</td>';

                $result = mysqli_query($conn,"SELECT * FROM Products WHERE `product_name`='$key'");
                $data = $result->fetch_all(MYSQLI_ASSOC);
                if($val >= $data[0]['amount']){
                    $val = $data[0]['amount'];
                }
                $finalPrice += $data[0]['price'] * $val;

                echo '<td>' . $data[0]['price'] * $val . '</td>' . '<td>' . $val
                . '</td>';
                echo '<td>';

                
                echo '<form action="" method="POST">'
                    . '<button name="rm-item" value="'.$key.'">'
    			        .    'Remove Item'
                    . '</button>'
    			. '</form>';

                echo '</td>' . '</tr>';
            }

?>