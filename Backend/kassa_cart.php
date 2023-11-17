<?php
//Gets the $id variable from the frontend kassa.php.
// $id holds the barcode from the item pressed.

// Sends a query request to the database and only gets the data from that product.
// Then fetch all the data thru the query as multiple array based on rows.
$result = mysqli_query($conn, "SELECT * FROM Products WHERE `barcode`='$id'");
$data = $result->fetch_all(MYSQLI_ASSOC);
$endCart = array_count_values($_SESSION['cart']);

// Session arrays gets the $data that is needed two show the right information in the cart.

if ($_COOKIE[$data[0]['product_name']."_counter"] <= ($data[0]['amount'] - 1)) {
    $prodCount = $endCart[$data[0]['product_name']];
    if($_COOKIE[$data[0]['product_name']."_counter"] == NULL){
        echo "<script>document.cookie = '".$data[0]['product_name']."_counter=1';</script>";
    }else{
        echo "<script>document.cookie = '".$data[0]['product_name']."_counter=".($_COOKIE[$data[0]['product_name']."_counter"]+1)."';</script>";
    }
    array_push($_SESSION['cart'], $data[0]['product_name']);
}else{
    echo "<script>alert('Max amount of item!');</script>";
}

// Sets upp the $finalPrice variable too show the end price.
$finalPrice = 0;

// includes the kassa_backend.php file too show the cart items.
include '../Backend/kassa_backend.php';
