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
<?php include "../Backend/produktNav.php" ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-3 p-2 g-col-6">
            <form action="" method="GET" class="form-inline">
                <div class="input-group">
                    <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Search for products">
                    </div>
                    <!-- Dropdown for filtering -->
                    <select name="filter" class="custom-select">
                        <option value="" disabled selected>filter</option>
                        <option value="drink">Dricka</option>
                        <option value="snacks">Snacks</option>
                        <option value="food">Mat</option>
                        <option value="verktyg">Verktyg</option>
                    </select>
                    <!--Filter button -->
                    <button type="submit" class="btn btn-outline-secondary  "><i class="fas fa-filter"></i> Filter</button>
                    <!--Reset button -->
                    <button type="button" class="btn btn-outline-secondary" onclick="resetForm()"><i class="fas fa-sync"></i>Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // JavaScript function to reset the form
    function resetForm() {
        document.querySelector('form').reset();
        // Reset the URL to remove query parameters
        window.location.href = window.location.pathname; 
    }
</script>
<?php 
            //includes the php code to view the products
                include '../Backend/Product_view.php';
            ?>
</body>