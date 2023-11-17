<?php
// Error checking for mysli query

ini_set('display_errors', '1');
error_reporting(E_ALL); 

  // Checks for the checkout button sending a post request
if(isset($_POST['checkout-btn'])){


// Gets the variables from credentials
include '../Backend/credentials.php';


// Makes the Session array into a count_values array and then destory the session
$endCart = array_count_values($_SESSION['cart']);
session_destroy();


// Makes the Sqlcheck variable and set it to false
  // Also makes a raido_val variable to get the post value to see what method the payment was in
$mysqlCheck = FALSE;
$radio_val = $_POST['radio-btn'];

  //Start the foreach
foreach($endCart as $key => $val){


// Create connection
$conn = mysqli_connect($server, $username, $password, $dbname, $port);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// Make a Query too the Products table to get variable
  // The query gets the row for the exakt product
$result = mysqli_query($conn,"SELECT * FROM Products WHERE `product_name`='$key'");
$data = $result->fetch_all(MYSQLI_ASSOC);

//Makes a variable for the price of the products and the max amount
$price = $data[0]['price'];
$amount = $data[0]['amount'];
// Variable to change the max amount to how much after
$amount = $amount - $val;


// Sql query to insert the purchase into the raport site
  // Product, amount, method and price per piece 
$sql = "INSERT INTO Payment (`product_name`, `amount_sold`, `payment_method`, `product_price`) VALUES ('$key', '$val', '$radio_val', '$price')";
// If the query works the variable for MysqlCheck to true
if (mysqli_query($conn, $sql)) {
    $mysqlCheck = True;
} else {
  // If the query failes the variable for MysqlCheck to flase
  echo '<script type="text/javascript">';
  echo 'alert("Error:"' . $sql . '"<br>"' . mysqli_error($conn). ');';
  echo '</script>';
  $mysqlCheck = false;
}

// Sql query to update the product amount in the database
$sql = "UPDATE Products SET `amount`='$amount' WHERE `product_name`='$key'";
// If the query works the variable for MysqlCheck to true
if (mysqli_query($conn, $sql)) {
  $mysqlCheck = True;
} else {
     // If the query failes the variable for MysqlCheck to flase
  echo '<script type="text/javascript">';
  echo 'alert("Error:"' . $sql . '"<br>"' . mysqli_error($conn). ');';
  echo '</script>';
  $mysqlCheck = false;
}

$result = mysqli_query($conn,"SELECT * FROM Products WHERE `product_name`='$key'");
$data = $result->fetch_all(MYSQLI_ASSOC);
if($data[0]['amount'] == 0){
  $sql = "DELETE FROM Products WHERE `product_name`='$key'";
  if (mysqli_query($conn, $sql)) {
    $mysqlCheck = True;
  } else {
  // If the query failes the variable for MysqlCheck to flase
  echo '<script type="text/javascript">';
  echo 'alert("Error:"' . $sql . '"<br>"' . mysqli_error($conn). ');';
  echo '</script>';
  $mysqlCheck = false;
}
}

// Then close the mysqli connection
mysqli_close($conn);
}

// IF the check variable is flase then show an error
if( $mysqlCheck === FALSE){
  echo '<script type="text/javascript">';
  echo 'alert("Error");';
  echo '</script>';
}
}
?>
