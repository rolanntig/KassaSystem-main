<?php
$result = mysqli_query($conn,"SELECT * FROM Products WHERE `barcode`='$id'");
$data = $result->fetch_all(MYSQLI_ASSOC);


array_push($_SESSION['cart'],$data[0]['product_name']);
array_push($_SESSION['cash'],$data[0]['price']);

$finalPrice = 0;


include '../Backend/kassa_backend.php';
?>