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
            <?php include "../Backend/produktNav.php" ?>    
            <h1 class="text-center">Produkter</h1>
            <form method="get" enctype="multipart/form-data" class="d-flex justify-content-center w-100 my-4 p-4">
                <div class="form-group col-8">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 mt-3 p-2 g-col-6">
                            <div class="input-group-lg ">
                                <!-- Search button -->
                                <input type="text" name="search" class="form-control" placeholder="Search for products">
                                <!-- Dropdown för filtering -->
                                <select name="filter" class="custom-select">
                                    <option value="" disabled selected>filter</option>
                                    <option value="drink">Dricka</option>
                                    <option value="snacks">Snacks</option>
                                    <option value="food">Mat</option>
                                    <option value="verktyg">Verktyg</option>
                                </select>
                                <!--Filter button -->
                                <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-filter"></i> Filter</button>
                                <!--Reset button -->
                                <button type="button" class="btn btn-outline-secondary" onclick="resetForm()"><i class="fas fa-sync"></i> Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <script>
                // JavaScript function för att restara form
                function resetForm() {
                    document.querySelector('form').reset();
                    // Reset the URL to remove query parameters
                    window.location.href = window.location.pathname; 
                }
            </script>
            <?php 
                //includes php code to view the products
                include '../Backend/Product_view.php';
            ?>
        </div>
    </div>
</body>
</html>
