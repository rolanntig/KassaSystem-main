<?php 
    include "../Backend/credentials.php";
    include "../Backend/databaseHandler.php";
    include "../Backend/console.php";
    $conn = mysqli_connect($server, $username, $password, $dbname, $port);
    function register($product_name,$product_info,$expire_date,$pris,$barcode,$antal){
        global $conn;
        $command = 
            "INSERT INTO `Products` (`ID`, `product_name`, `product_info`, `expire_date`, `price`, `barcode`, `amount`)
                VALUES ('$product_name', '$product_info', '$expire_date', '$pris', '$barcode', '$antal') /*ON DUPLICATE KEY UPDATE (amount='$antal', price='$pris'*/;";  
        
        try {
            $conn->query($command) or exit(console("DUPLICATE: "($conn->error)));
            console("Registration was successful");  
        
        } catch (\Throwable $th) {
            console($th->getMessage());
            console($th->getLine());
        } 
    }
?>