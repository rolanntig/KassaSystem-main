<?php
    include "./Backend/credentials.php";

    // Selects all barcodes in db and assigning to the variable
    $barcode_already_exist = "SELECT COUNT(*) FROM Products WHERE barcode = $barcode";
    $result = $conn->query($barcode_already_exist);

    if ($result) {
        $row = $result->fetch_assoc();
        $barcode_exist = $row['COUNT(*)'];

        // Checks if barcode exists in db. If it does, it gives a warning that it already exists
        if ($barcode_exist > 0) {
            echo "<div class='card border-0 shadow rounded-3 br1em mt-2 text-center bg-danger text-white w-50 mx-auto align-middle'>
                    <p class='p-2 pt-4'>
                        Denna streckkod existerar redan 
                    </p>
                 </div>";
            header("Refresh:2; url=#");
        } else {
            $sql = "INSERT INTO Products (product_name, product_info, expire_date, price, barcode, amount, category) 
                    VALUES ('$product', '-', '$expire', '$price', '$barcode','$amount','$type')";
            
            try {
                if ($conn->query($sql)) {
                    // Fetch the details of the newly inserted product
                    $newProductQuery = "SELECT * FROM Products WHERE barcode = '$barcode'";
                    $newProductResult = $conn->query($newProductQuery);

                    if ($newProductResult) {
                        $newProductRow = $newProductResult->fetch_assoc();

                        // Display success message
                        echo "<div class='card border-0 shadow rounded-3 br1em mt-2 text-center bg-success text-white w-50 mx-auto align-middle'>
                                <p class='p-2 pt-4'>
                                    Produkt registrerad: " . $newProductRow['product_name'] . "
                                </p>
                             </div>";
                        header("Refresh:2; url=#");
                    } else {
                        // Handle error fetching new product details
                        echo "<div class='card border-0 shadow rounded-3 br1em mt-2 text-center bg-danger text-white w-50 mx-auto align-middle'>
                                <p class='p-2 pt-4'>
                                    Registrering misslyckades
                                </p>
                             </div>";
                        $dom = new DOMDocument();
                        $dom->loadHTML($html);
                        $xpath = new DOMXPath($dom);
                        $hrefs = $xpath->evaluate("/html/body/div/div/form/div/input");

                        // console($hrefs);

                        header("Refresh:10; url=#");
                    }
                } else {
                    // ... (existing code for registration failure)
                }
            } catch (\Throwable $th) {
                // ... (existing error handling code)
            }
        }
    }
?>
