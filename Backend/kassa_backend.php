<?php
$endCart = array_count_values($_SESSION['cart']); 
$endPrice = array_count_values($_SESSION['cash']);

            
            foreach($endCart as $key => $val){
                echo '<tr>' .'<td>'. $key.'</td>';

                $result = mysqli_query($conn,"SELECT * FROM Products WHERE `product_name`='$key'");
                $data = $result->fetch_all(MYSQLI_ASSOC);
                if($val >= $data[0]['amount']){
                    $val = $data[0]['amount'];
                }
                $finalPrice += $data[0]['price'] * $val;

                echo '<td>' . $data[0]['price'] * $val . 'kr</td>' . '<td>' . $val
                . 'st</td>' . '<td>';

                
                echo '<form action="" method="POST">'
                    . '<button name="rm-item" value="'.$key.'">'
    			        .    'X'
                    . '</button>'
    			. '</form>';

                echo '</td>' . '</tr>';
            }

?>