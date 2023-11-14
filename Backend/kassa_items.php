<?php
    session_start();
    if(!isset($_SESSION['cart']) && !is_array($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    if(!isset($_SESSION['cash']) && !is_array($_SESSION['cash'])){
        $_SESSION['cash'] = array();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../Styles/kassa.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<?php
    // include the config.php file to get connected to the Database
include 'credentials.php';

    // sends a query to the Products table thru the connection($conn)
        // Then fetch all the data thru the query as multiple array based on rows
$result = mysqli_query($conn,"SELECT * FROM Products");
$data = $result->fetch_all(MYSQLI_ASSOC);
?>

<!-- Only html table as this file will be included in the index page -->
<form action="" method="POST">
    <table>
        <!-- Makes a foreach to make a tr ad td for every index in the array -->
    <?php 
    foreach($data as $row): ?>
    <td>
            <!-- Uses php in the td to show every data in the index -->
        <tr>
        <button type="submit" name="item" value="<?= htmlspecialchars($row['barcode']) ?>">
            <img src="https://placehold.co/50X50" alt="test">

        </button>
        <div>
                <h7><u><?= htmlspecialchars($row['product_name']) ?></u></h7>
                <p><?= htmlspecialchars($row['price']) ?> kr</p>
        </div>
        </tr>
    </td>
        <!-- Ends the foreach -->
    <?php endforeach ?>
        <!-- Delete button in the view function -->
    <?php 
        $id = $_POST['item'];
        if ( isset($_POST['item'])){
            $result = mysqli_query($conn,"SELECT * FROM Products WHERE `barcode`='$id'");
            $data = $result->fetch_all(MYSQLI_ASSOC);
            //show only object_id, name and wish
            array_push($_SESSION['cart'],$data[0]['product_name']);
            array_push($_SESSION['cash'],$data[0]['price']);
            $endCart = array_count_values($_SESSION['cart']); 
            $endPrice = array_count_values($_SESSION['cash']); 
        }
    ?>
    </table>
</form>
</body>
</html>