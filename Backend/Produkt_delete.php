<?php
// include the credentials.php file to get connected to the Database
include "credentials.php";
echo "helo";
$sql = "DELETE FROM Products WHERE ID=$id";


if ($conn->query($sql) === TRUE) {
//  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>