<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
    // include "databasehandler.php";
    // include "secret.php";

    $sqlGetProduct  = 'SELECT * FROM Products';
    $products       = mysqli_query($conn, $sqlGetProduct);
    $array          = array();
    // $row            = mysqli_fetch_assoc($products);

    foreach (mysqli_fetch_assoc($products) as $value) {
        // echo "<li class='media'>";
        // echo '<form action="#" method="POST">';
        // echo '<div class="card-body">';
        // echo '<h5 class="card-title">'.$row['product_name'].'</h5>';
        // echo '<p class="card-text">Bäst före: '.$row['expire_date'].'</p>';
        // echo '<p class="card-text">Pris: '.$row['price'].' kr</p>';
        // echo '<p class="card-text">Finns i lager: '.$row['amount'].'</p>';
        // echo '<input type="text" name="kassaKnapp" value="'.$row['product_name'].'"style="display:none;">';
        // echo '<button name="btn" type="submit" class="btn choose">Välj</button>';
        // //<button name="submit" type="submit" class="btn text-white mt-2 mb-4">Registrera varan</button>
        // echo '</form>';
        // echo '</div>';
        // echo '</li>';
    }
?>