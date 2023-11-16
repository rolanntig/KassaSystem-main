<?php
// tar allt (*) från databasen
$result = mysqli_query($conn,"SELECT * FROM Products WHERE `barcode`='$id'");
$data = $result->fetch_all(MYSQLI_ASSOC);

// sätter datan från databasen in i arrayn
array_push($_SESSION['cart'],$data[0]['product_name']);
array_push($_SESSION['cash'],$data[0]['price']);

// skapar en variabel för totala summan
$finalPrice = 0;

// inkulderar en anna php fil
include '../Backend/kassa_backend.php';
?>