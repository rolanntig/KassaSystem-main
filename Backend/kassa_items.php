<?php
    // Start a session too keep the array values even after a post
    session_start();
    if(!isset($_SESSION['cart']) && !is_array($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }


    // include the credentials.php file to get connected to the Database
    include 'credentials.php';

    // sends a query to the Products table thru the connection($conn)
    // Then fetch all the data thru the query as multiple array based on rows
    $result = mysqli_query($conn,"SELECT * FROM Products");
    $data = $result->fetch_all(MYSQLI_ASSOC);
?>

<!-- Form to have the items be able to send a post request -->
<form action="" method="POST">
        <!-- Makes a foreach to make a item for for every index in the array -->
    <?php 
    foreach($data as $row): ?>
    <!-- Checks if the amount is less or equal to zero -->
    <?php if($row['amount'] <= 0){continue;}?>
            <!-- Uses php in the tags to show every data in the index -->
        <div>
            <!-- Button to make the items pressable -->
                <!-- Img url is the image file name from the database -->
                <!-- Value and Id is the barcode form the database -->
                <!-- Class is the catagory from the database -->
        <button style="background-image: url('../Backend/image/<?=$row['image']?>');" type="submit" name="item" value="<?= htmlspecialchars($row['barcode']) ?>"  class="<?= htmlspecialchars($row['category']) ?>" id="<?= htmlspecialchars($row['barcode']) ?>">

            <!-- Writes out the product name and the price -->
            <p><u><?= htmlspecialchars($row['product_name']) ?></u></p>
            <p><?= htmlspecialchars($row['price']) ?> kr</p>
        </button>
        </div>
        <!-- Ends the foreach -->
    <?php endforeach ?>
</form>