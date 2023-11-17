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
    <link rel="stylesheet" href="./Styles/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./Styles/produkt.css"> 
    <link rel="stylesheet" type="text/css" href="./Styles/main.css"> 
    <title>Produkter</title>
</head>
<body>
<?php include "../Frontend/header.php" ?>
    <div class="container">
        <div class="bg-white p-3 br1em">
        <?php include "../Backend/produktNav.php"; ?>
            <h1 class="mb-4 mt-3 text-center">Registrera produkt</h1>
            <form action="#"class="d-flex justify-content-center w-100" method="post" enctype="multipart/form-data">
            <div class="form-group col-8">
            <!-- Form där du fyller i information till produkter som sen kommer in i backend -->
                <div class="parent1">
                    <div class="div1"><label>Produkt:</label> <input name="product"type="text" class="form-control mb-3" required placeholder="Vad för produkt?"> </div>
                    <div class="div4"><label>Antal:</label> <input name="amount" type="number" class="form-control mb-3" required placeholder="Hur många av den produkten?"> </div>
                    <div class="div5"><label>Pris:</label> <input name="price" type="number" class="form-control mb-3" required placeholder="Hur mycket kostar produkten?"> </div>
                    <div class="div6"><label>Bäst Före:</label> <input name="expire" type="datetime-local" class="form-control mb-3"> </div>
                    <div class="div2"><label>Barcode:</label> <input name="barcode" type="text" class="form-control mb-3" maxlength="13" required placeholder="Scana streckkod"> </div>
                    <div class="div3"> <label for="type">Typ:</label>
                        <select name="type" id="type" class="form-control mb-3" required>
                            <option value="" disabled selected>Vilken typ av produkt det är det?</option>
                            <option value="drink">Dricka</option>
                            <option value="snacks">Snacks</option>
                            <option value="food">Mat</option>
                            <option value="verktyg">Verktyg</option>
                        </select>
                    </div> 
                    <!-- Button för att registera produkten -->
                    <div class="div7"><label for="image">Bild</label> <input type="file" accept="image/*" class="form-control" id="image" name="image" required></div>
                    <button name="submit" type="submit" class="btn text-white mb-3 btn">Registrera varan</button>
                    </div>
                    <?php
                        include "../Backend/credentials.php";                  
                        //Registerar en produkt
                        $product    = $_POST['product'];
                        $amount     = $_POST['amount'];
                        $price      = $_POST['price'];
                        $expire     = $_POST['expire'];
                        $barcode    = $_POST['barcode'];
                        $type       = $_POST['type'];
                        $image      = $_FILES['image']['name']; 
                        if (isset($_POST['submit'])){
                            include '../Backend/Register_Product.php';

                        }
                    ?>
                </div>
            </form>

        </div>
    </div>
</body>
</html>
