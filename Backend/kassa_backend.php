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
    <!-- Makes a foreach to make a tr ad td for every index in the array -->
    <div>
    <?php 
    foreach($data as $row): ?>
            <!-- Uses php in the td to show every data in the index -->
            <button type="submit" name="item" value="<?= htmlspecialchars($row['barcode']) ?>">
                <img src="https://placehold.co/50X50" alt="test">
                <div>
                    <h7><u><?= htmlspecialchars($row['product_name']) ?></u></h7>
                    <p><?= htmlspecialchars($row['price']) ?> kr</p>
                </div>
            </button>
    <!-- Ends the foreach -->
    <?php endforeach ?>
    </div>
    <br>
    <div class="d-flex flex-row">
    <?php 
        $id = $_POST['item'];
        if ( isset($_POST['item'])){
            $result = mysqli_query($conn,"SELECT * FROM Products WHERE `barcode`='$id'");
            $data = $result->fetch_all(MYSQLI_ASSOC);
            array_push($_SESSION['cart'],$data[0]['product_name']);
            array_push($_SESSION['cash'],$data[0]['price']);

            $finalPrice = 0;
            $endCart = array_count_values($_SESSION['cart']); 
            $endPrice = array_count_values($_SESSION['cash']);

            echo '<div class="p-2">';
            echo '<table class="table">';
            foreach($endCart as $key => $val){
                echo '<tr>';
                echo '<td>';
                echo $key;
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '</div>';
            echo '<div class="p-2">';
            echo '<table class="table">';
            foreach($endPrice as $key => $val){
                echo '<tr>';
                echo '<td>';
                $finalPrice += $key * $val;
                echo $key * $val;
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '</div>';
        }
    ?>
    </table>
    </div>
    <form action="" method="POST">
    <button name="close">
        Empty Cart
    </button>
    </form>
    <?php 
        if(isset($_POST['close'])){
            session_destroy();
            unset($_SESSION['cart']);
            print_r($_SESSION['cart']);
        }
    ?>
    </form>
</body>
</html>