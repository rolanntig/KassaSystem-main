<div class="cart-items">
<?php
$result = mysqli_query($conn,"SELECT * FROM Products WHERE `barcode`='$id'");
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
            echo '<th>';
            echo 'ITEMS';
            echo '</th>';
            echo '</tr>';
            foreach($endCart as $key => $val){
                echo '<tr>';
                echo '<td>';
                echo $key;
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '</div>';
            echo '<div class="cart-contain">';
            echo '<table>';
            echo '<tr>';
            echo '<th>';
            echo 'PRICES';
            echo '</th>';
            echo '<th>';
            echo 'AMOUNT';
            echo '</th>';
            echo '</tr>';
            foreach($endPrice as $key => $val){
                echo '<tr>';
                echo '<td>';
                $finalPrice += $key * $val;
                echo $key * $val;
                echo '</td>';
                echo '<td>';
                echo $val;
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '</div>';
?>
</div>
