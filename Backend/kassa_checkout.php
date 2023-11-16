<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

if(isset($_POST['checkout-btn'])){

include '../Backend/credentials.php';

$endCart = array_count_values($_SESSION['cart']);
session_destroy();
$mysqlCheck = FALSE;
$radio_val = $_POST['radio-btn'];
foreach($endCart as $key => $val){
//echo $key. " " . $val ." " . $date;

// Create connection
$conn = mysqli_connect($server, $username, $password, $dbname, $port);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO Payment (`product_name`, `amount_sold`, `payment_method`) VALUES ('$key', '$val', '$radio_val')";
if (mysqli_query($conn, $sql)) {
    $mysqlCheck = True;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  $mysqlCheck = false;
}
$result = mysqli_query($conn,"SELECT * FROM Products WHERE `product_name`='$key'");
$data = $result->fetch_all(MYSQLI_ASSOC);
$amount = $data[0]['amount'];
$amount = $amount - $val;

$sql = "UPDATE Products SET `amount`='$amount' WHERE `product_name`='$key'";
if (mysqli_query($conn, $sql)) {
  $mysqlCheck = True;
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
$mysqlCheck = false;
}

mysqli_close($conn);
}
if( $mysqlCheck === FALSE){
    Echo "ERROR";
}
}
?>