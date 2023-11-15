<?php
    include "./Backend/credentials.php";

    // Assuming $barcode is defined somewhere before this code
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
            // File upload code
            if(isset($_FILES['image'])){
                move_uploaded_file($_FILES['image']['tmp_name'], "../Backend/image/" . $_FILES['image']['name']);
                $image = $_FILES['image']['name'];
            }
            $sql = "INSERT INTO Products (product_name, product_info, expire_date, price, barcode, amount, category, `image`) 
                    VALUES ('$product', '-', '$expire', '$price', '$barcode','$amount','$type', '$image')";
            try {
                if ($conn->query($sql)) {
                    // Display success message
                    echo "<div class='card border-0 shadow rounded-3 br1em mt-2 text-center bg-success text-white w-50 mx-auto align-middle'>
                            <p class='p-2 pt-4'>
                                Produkt registrerad: $product
                            </p>
                         </div>";
                    header("Refresh:2; url=#");
                } else {
                    // Display fail message
                    echo "<div class='card border-0 shadow rounded-3 br1em mt-2 text-center bg-danger text-white w-50 mx-auto align-middle'>
                            <p class='p-2 pt-4'>
                                Registrering misslyckades
                            </p>
                         </div>";
                    $dom = new DOMDocument();
                    $dom->loadHTML($html);
                    $xpath = new DOMXPath($dom);
                    $hrefs = $xpath->evaluate("/html/body/div/div/form/div/input");

                    header("Refresh:10; url=#");
                }
            } catch (Exception $e) {
                // Handle exceptions if needed
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>
