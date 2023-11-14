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
    <tr>
            <!-- Uses php in the td to show every data in the index -->
        <td>
        <button type="submit" name="item" value="<?= htmlspecialchars($row['barcode']) ?>">
            <img src="https://placehold.co/50X50" alt="test">
        </button>
        </td>
        <td><?= htmlspecialchars($row['ID']) ?></td>
        <td><?= htmlspecialchars($row['product_name']) ?></td>
        <td><?= htmlspecialchars($row['product_info']) ?></td>
        <td><?= str_split($row['expire_date'], 10)[0];?></td>
        <td><?= htmlspecialchars($row['price']) ?></td>
        <td><?= htmlspecialchars($row['barcode']) ?></td>
        <td><?= htmlspecialchars($row['amount']) ?></td>
        <td><?= htmlspecialchars($row['category']) ?></td>
    </tr>
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
            $count = 1;
            echo sizeof($_SESSION['cart']) ." " ." size" ."<br>" ;
                for($i = 0; $i < sizeof($_SESSION['cart']); $i++){
                    for($j = $i+1; $j < sizeof($_SESSION['cart']); $j++){
                        if($_SESSION['cart'][$i] === $_SESSION['cart'][$j]){
                            $count++;
                            echo $i ."<br>";
                            echo $j ."<br>";
                            echo $_SESSION['cart'][$i] ."<br>";
                            echo $_SESSION['cart'][$j] ."<br>";
                        }
                    }
                }
            print_r($_SESSION['cart']);
            echo "<br>";
            //foreach($_SESSION['cart'] as $info):
            //    echo '<tr>';
            //        print $info . "<br>";
            //    echo '</tr>';
            //endforeach;
        }
    ?>
    </table>
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