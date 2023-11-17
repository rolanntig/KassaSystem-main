<?php
    // $changes the session array to array_count_values arrays too count the duplicets in the array.
$endCart = array_count_values($_SESSION['cart']); 
             // sets upp a foreach two show every thing in the $endcart array.
             // $Key is the product name and $val is the amount of times it is in the array
                // $val is the amount of that item/the amount of times it has been pressed.
            foreach($endCart as $key => $val){
                // The start of the table is in the kassa_php file.
                    // Show a tr with the product name 
                echo '<tr>' .'<td>'. $key.'</td>';

                // Sends a query too find the row were the product_name column is the same as the product name of the item in the array
                $result = mysqli_query($conn,"SELECT * FROM Products WHERE `product_name`='$key'");
                $data = $result->fetch_all(MYSQLI_ASSOC);

                // Checks if the amount is higher or equal to the max amount of that product in the database
                // if it is then it makes it so the amount in the cart gets reset to the max amount so that you can't but more then what exist
                if($val == $data[0]['amount']){
                    $val = $data[0]['amount'];
                }
                $itemName = $data[0]['product_name'];

                // Sets the $val to the value of the cookie of each item in the $endCart array
                $val = $_COOKIE[$itemName."_counter"];

                // Make it so the $finalPrice is the added price from every loop
                    // The price is the amount multiplied by the price of the item
                $finalPrice += $data[0]['price'] * ($val);
                $maxAmount = $data[0]['amount'];
                $priceThing = $data[0]['price'];

                // Writes out the price and the amount
                // Prints based on the value of the specified items cookie value because
                // Certain values made loading errors where there were no fix to be found (yet)
                if($val == 0){
                    echo "<td id='".$itemName."_prices'>" . $priceThing * (1) . 'kr</td>' . "<td><input class='kassaAmountInput' name='$priceThing' id='".$itemName."_counter' type='number' min='1' max='$maxAmount' value='".(1)."'></input></td>" . '<td>';
                }else{
                    if($val != $maxAmount){
                        echo "<td id='".$itemName."_prices'>" . $priceThing * ($val+1) . 'kr</td>' . "<td><input class='kassaAmountInput' name='$priceThing' id='".$itemName."_counter' type='number' min='1' max='$maxAmount' value='".($val+1)."'></input></td>" . '<td>';
                    }else{
                        echo "<td id='".$itemName."_prices'>" . $priceThing * ($val) . 'kr</td>' . "<td><input class='kassaAmountInput' name='$priceThing' id='".$itemName."_counter' type='number' min='1' max='$maxAmount' value='".($val)."'></input></td>" . '<td>';
                    }
                }

                // Form to remove the item from the cart
                echo '<form action="" method="POST">' // Value is the $key/product_name
                    . '<button name="rm-item" value="'.$key.'">'
    			        .    '<i class="fa-solid fa-trash"></i>'
                    . '</button>'
    			. '</form>';

                // End of td and tr
                echo '</td>' . '</tr>';
            }

?>