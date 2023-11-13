<?php
    /*session_start();
    if(!$_SESSION["inloggad"]){
	    header("location:index.php");
    }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./Styles/navbar.css"> 
    <link rel="stylesheet" type="text/css" href="./Styles/kassa.css"> 
    <title>Produkter</title>
</head>
<body>
    <?php include "../Backend/header.php" ?>
    <div class="container">
        <div class="bg-white p-3 br1em">
            <h1 class="mb-4 mt-3 text-center">Registrera produkt</h1>
            <form action="#"class="d-flex justify-content-center w-100" method="POST">
                <div class="form-group col-8">
                    <label>Produkt</label>
                    <input name="product"type="text" class="form-control mb-3">
                    <label>Antal</label>
                    <input name="amount" type="number" class="form-control mb-3">
                    <label>Pris</label>
                    <input name="price" type="text" class="form-control mb-3">
                    <label>Bäst Före</label>
                    <input name="expire" type="datetime-local" class="form-control mb-3">
                    <label>Barcode</label>
                    <input name="barcode" type="text" class="form-control mb-3">
                    <!-- add Event Handler For Enter Key-->
                    <button name="submit" type="submit" class="btn text-white mt-2 mb-2">Registrera varan</button>
                    
                    <?php
                        include "../Backend/credentials.php";
                        $conn = new mysqli($server, $username, $password, $dbname,$port);
                                            
                        //Registering a product
                        if(isset($_POST['submit'])){
                            $product    = $_POST['product'];
                            $amount     = $_POST['amount'];
                            $price      = $_POST['price'];
                            $expire     = $_POST['expire'];
                            $barcode    = $_POST['barcode'];

                            $sqlquery = "INSERT INTO Products (product_name, product_info, expire_date, price, barcode,amount,category) VALUES ('$product', '-', '$expire', '$price', '$barcode','$amount','-')";
                            try {
                                if ($conn->query($sqlquery)) {
                                    //echo "<script>alert('Produkt registrerad')</script>";
                                    echo "<div class='card border-0 shadow rounded-3 br1em mt-2 text-center bg-success text-white w-50 mx-auto align-middle'>
                                            <p class='p-2 pt-4'>
                                                Produkt registrerad
                                            </p>
                                        </div>
                                    ";
                                    header("Refresh:2; url=#");
                                }
                                else {
                                    echo "<div class='card border-0 shadow rounded-3 br1em mt-2 text-center bg-danger text-white w-50 mx-auto align-middle'>
                                            <p class='p-2 pt-4'>
                                                Registrering misslyckades
                                            </p>
                                        </div>
                                    ";
                                    
                                    $dom = new DOMDocument();
                                    $dom->loadHTML($html);
                                    $xpath = new DOMXPath($dom);
                                    $hrefs = $xpath->evaluate("/html/body/div/div/form/div/input");

                                    console($hrefs);

                                    header("Refresh:10; url=#");
                                }
                            }
                            catch (\Throwable $th) {
                                console($th->getMessage());
                                console($th->getLine());
                            }
                        }
                    ?>
                </div>
            </form>
            <h1 class="mb-4 mt-3 text-center">Produkter</h1>
            <table id="produkterKvar" class="table">
                <thead>
                    <tr>
                        <th scope="col">Produkt</th>
                        <th scope="col">Antal</th>
                        <th scope="col">Pris</th>
                        <th scope="col">Bäst före</th>
                        <th scope="col">Barcode</th>
                    </tr>
                </thead>
                <?php
                    include "../Backend/credentials.php";
                    try {
                        $sqlGetProduct = 'SELECT * FROM Products';
                        $products= mysqli_query($conn, $sqlGetProduct);
                        //fetches all products from database
                        while($row = mysqli_fetch_assoc($products)){
                            echo '<tr>';
                            echo '<td>'.$row['product_name'].'</td>';
                            echo '<td>'.$row['amount'].'</td>';
                            echo '<td>'.$row['price'].' kr </td>';
                            echo '<td>'.$row['expire_date'].'</td>';
                            echo '<td>'.$row['barcode'].'</td>';
                            echo '</tr>';
                        }
                        
                        mysqli_close($conn);
                    } catch (\Throwable $th) {
                        console($th->getMessage());
                        console($th->getLine());
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
