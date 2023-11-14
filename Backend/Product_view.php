<?php
include "../Backend/credentials.php";

// Check if the search query is set
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Perform a query to fetch products based on the search query
    // Modify this query according to your database structure
    $sqlGetProduct = "SELECT * FROM Products WHERE product_name LIKE '%$search%'";
} else {
    // If no search query, display all products
    $sqlGetProduct = 'SELECT * FROM Products';
}

try {
    $products = mysqli_query($conn, $sqlGetProduct);
    // fetches all products from the database

    echo '<table id="produkterKvar" class="table">
            <thead>
                <tr>
                    <th scope="col">Produkt</th>
                    <th scope="col">Typ</th>
                    <th scope="col">Antal</th>
                    <th scope="col">Pris</th>
                    <th scope="col">Bäst före</th>
                    <th scope="col">Barcode</th>
                    <th scope="col">Ta bort</th>
                </tr>
            </thead>';

    while ($row = mysqli_fetch_assoc($products)) {
        echo '<tr>';
        echo '<td>' . $row['product_name'] . '</td>';
        echo '<td>' . $row['category'] . '</td>';
        echo '<td>' . $row['amount'] . '</td>';
        echo '<td>' . $row['price'] . ' kr </td>';
        echo '<td>' . $row['expire_date'] . '</td>';
        echo '<td>' . $row['barcode'] . '</td>';
        echo '<td>'
            . '<form action="" method="POST">'
            . '<button type="submit" class="btn btn" value="' . $row['ID'] . '" name="del" id="del-btn"> 
                Delete'
            . '</button>'
            . '</form>'
            . '</td>';
        echo '</tr>';
    }

    echo '</table>';

    // Handle product deletion
    if (isset($_POST['del'])) {
        include 'delete.php';
    }

    mysqli_close($conn);
} catch (\Throwable $th) {
    console($th->getMessage());
    console($th->getLine());
}
?>
