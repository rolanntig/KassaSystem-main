<?php
    // include the credentials.php file to get connected to the Database
include "credentials.php";

$sql = "DELETE FROM Products WHERE id=$id";

if ($conn->query($sql) !== TRUE) {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>