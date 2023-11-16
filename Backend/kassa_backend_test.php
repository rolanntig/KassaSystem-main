<?php
    session_start();
    if(!isset($_SESSION['cart']) && !is_array($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</form>
    <br>
    <div class="d-flex flex-row">
				<table>
					<?php 
					echo '<tr>' .'<th>' .'ITEMS' .'</th>' .'<th>' .'PRICES' .'</th>' .'<th>' .'AMOUNT' .'</th>' .'</tr>';
        			$id = $_POST['item'];
        			if ( isset($_POST['item'])){
                        $result = mysqli_query($conn,"SELECT * FROM Products WHERE `barcode`='$id'");
                        $data = $result->fetch_all(MYSQLI_ASSOC);
                        
                        
                        array_push($_SESSION['cart'],$data[0]['product_name']);
                        
                        $finalPrice = 0;
                        
                        
                        include '../Backend/kassa_backend_2_test.php';
        			}if(isset($_POST['rm-item'])){
						$_SESSION['cart'] = array_filter($_SESSION['cart'], function($v) { return $v != $_POST['rm-item']; });
                        include '../Backend/kassa_backend_2_test.php';
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
    <form action="" method="POST">
        <button name="checkout-btn">
            Checkout
        </button>
    </form>
    <?php 
    ini_set('display_errors', '1');
    error_reporting(E_ALL);

        if(isset($_POST['checkout-btn'])){

            include '../Backend/credentials.php';

            $endCart = array_count_values($_SESSION['cart']);
            session_destroy();
            $mysqlCheck = FALSE;
            foreach($endCart as $key => $val){
            //echo $key. " " . $val ." " . $date;

            // Create connection
            $conn = mysqli_connect($server, $username, $password, $dbname, $port);
            // Check connection
            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "INSERT INTO Payment (`product_name`, `amount_sold`, `payment_method`) VALUES ('$key', '$val', 'Swish')";
            if (mysqli_query($conn, $sql)) {
                $mysqlCheck = True;
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              $mysqlCheck = false;
            }
            mysqli_close($conn);
            }
            if( $mysqlCheck === True){
                Echo "Payment Successful";
            }
        }
    ?>
</body>
</html>