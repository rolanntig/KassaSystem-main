<?php 
// Tar in credentials.php
include 'credentials.php';
// Gör så att priset ändras 
$sql = "UPDATE Products SET price = $newPrice WHERE barcode=$barcode";

if ($conn->query($sql) === TRUE) {
  echo "Price updated successfully";
} else {
  echo "Error updating price: " . $conn->error;
}

$conn->close();
?>
