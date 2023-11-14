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
    <link rel="stylesheet" type="text/css" href="./Styles/rapport.css">
    <title>Rapport</title>
</head>
<body>
    <?php 
        include "../Backend/header.php";
        include '../Backend/console.php';
    ?>
    <div class="container">
        <div class="bg-white p-3 br1em">
            <h1 class="mb-4 mt-3 text-center">Rapport</h1>
            <div class="d-flex justify-content-between flex-row">
                <div class="col-5 text-center p-5 mb-5 mt-5" id="pengar-idag" >
                    <?php
                        include "../Backend/getRapport.php";
                        getDailyRapport();
                    ?>
                </div>
                <div class="col-5 text-center p-5 mb-5 mt-5" id="pengar-manad">
                    <?php
                        getMonthlyRapport();           
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>