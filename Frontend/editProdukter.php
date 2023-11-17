<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <!-- Tar in navbar för produkt delarna -->
        <?php include "../Backend/produktNav.php"?>
            <h1 class="mb-4 mt-3 text-center">Ändra information på produkt</h1>
            <form method="post" enctype="multipart/form-data" class="d-flex justify-content-center w-100"class="my-4 p-4 border">
            <div class="form-group col-8">
                <!-- Form där du fyller i information till produkter som ska ändras-->
                <div class="parent1">
                <div class="div1"><label>Barcode:</label> <input name="barcode" type="text" class="form-control mb-3" placeholder="Produktens streckkod som ska ändras"required></div>
                <div class="div7"><label>Uppdatera:</label> <button type="submit" name="update2" class="form-control btn text-white mb-3 btn">Uppdatera</button></div>
                <div class="div5"><label for="type">Typ:</label>
                        <select name="newType" id="type" class="form-control mb-3" required>
                            <option value="" disabled selected>Vilken typ av produkt det är det?</option>
                            <option value="drink">Dricka</option>
                            <option value="snacks">Snacks</option>
                            <option value="food">Mat</option>
                            <option value="verktyg">Verktyg</option>
                        </select></div>
                <div class="div6"><label>Bäst Före:</label> <input name="newExpire" type="datetime-local" class="form-control mb-3"></div>
                <div class="div2"><label>Antal</label> <input name="newAmount" type="number" class="form-control mb-3" required placeholder="Hur många av den produkten?"></div>
                <div class="div3"><label>Pris:</label> <input name="newPrice" type="number" class="form-control mb-3" required placeholder="kr"></div>
                <div class="div4"><label for="image">Bild</label> <input type="file" accept="image/*" class="form-control" id="image" name="image" required></div>
            </div>
            </form>
    <!-- Tar in delar till backend från form -->
    <?php 
    if (isset($_POST['update2'])){
    $newProduct = $_POST['newProduct'];
    $newPrice = $_POST['newPrice'];
    $newAmount = $_POST['newAmount'];
    $newExpire = $_POST['newExpire'];
    $newType = $_POST['newType'];
    $barcode = $_POST['barcode'];
    include '../Backend/updateProdukt.php';
    } ?>

