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
            echo '<th>';
            echo 'PRICES';
            echo '</th>';
            echo '<th>';
            echo 'AMOUNT';
            echo '</th>';
            echo '</tr>';
            foreach($endCart as $key => $val){
                echo '<tr>';
                echo '<td>';
                echo $key;
                echo '</td>';
                $result = mysqli_query($conn,"SELECT * FROM Products WHERE `product_name`='$key'");
                $data = $result->fetch_all(MYSQLI_ASSOC);
                $finalPrice += $data[0]['price'] * $val;
                echo '<td>';
                print_r($data[0]['price'] * $val);
                echo '</td>';
                echo '<td>';
                echo $val;
                echo '</td>';
                echo '</tr>';
            }
?>
</div>
