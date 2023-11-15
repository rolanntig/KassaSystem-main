<div class="cart-items">
<?php
$result = mysqli_query($conn,"SELECT * FROM Products WHERE barcode='$id'");
            $data = $result->fetch_all(MYSQLI_ASSOC);
            array_push($_SESSION['cart'],$data[0]['product_name']);
            array_push($_SESSION['cash'],$data[0]['price']);

            global $finalPrice;
            $finalPrice = 0;
            $endCart = array_count_values($_SESSION['cart']); 
            $endPrice = array_count_values($_SESSION['cash']);

            echo '<div class="cart-contain">';

            echo '<table>';
            echo '<tr>';
            echo '<th>ITEMS </th>';
            echo '<th>PRICES </th>';
            echo '<th>AMOUNT </th>';
            echo '</tr>';
            
            foreach($endCart as $key => $val){
                echo '<tr>';
                echo '<td>'.$key.'</td>';
                $result = mysqli_query($conn,"SELECT * FROM Products WHERE product_name='$key'");
                $data = $result->fetch_all(MYSQLI_ASSOC);
                $finalPrice += $data[0]['price'] * $val;
                echo '<td>'.$data[0]['price'] * $val.'kr</td>';
                echo '<td>'.$val.'<span style="float:right;">st</span></td>';
                echo '</tr>';
                
            }
            echo '</table>';
            echo'</div>';
?>
</div>