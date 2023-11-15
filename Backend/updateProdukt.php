<?php 
// Tar in credentials.php
include 'credentials.php';
// Gör så att produkten ändras
$sql = "UPDATE Products 
SET price = '$newPrice', amount = '$newAmount', expire_date = '$newExpire', category = '$newType', image = '$image'
WHERE barcode=$barcode"; // FÖRÄNDRA INTE WHERE, ifall den inte är korrekt förändras alla produkter i tabellen

if ($conn->query($sql) === TRUE) {
  echo "Produkt uppdaterad!";
} else {
  echo "Error updating: " . $conn->error;
}

$conn->close();
?>
