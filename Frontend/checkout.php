<?php
    session_start();/*
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
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./Styles/navbar.css"> 
    <link rel="stylesheet" type="text/css" href="./Styles/kassa.css"> 
    <title>Varukorg</title>
</head>
<body>
    <?php include "../Backend/header.php" ?>
    <div class="container">
        <div class="bg-white p-1 br1em">
            <section class="pt-1 pb-2">
                <div class="container">
                    <div class="row w-100">
                        <div class="col-lg-12 col-md-12 col-12">
                            <h3 class="display-5 mb-2 text-center">Varukorg</h3>
                            <p class="mb-5 text-center">
                                <i class="text-info font-weight-bold"> 
                                    <?php echo $_SESSION["index"];?>
                                </i> 
                                varor i din varukorg
                            </p>
                            <div class="float-right text-right">
                                <?php include "../Backend/Calculation.php"; ?>
                                <h4>Rest:</h4>
                                <h1>
                                    <?php 
                                        if (isset($_POST["kontant"])){
                                            $method = "cash";
                                            $kont = $_POST["kontVal"];
                                            $rest = $kont - $_SESSION["sum"];
                                            echo $rest;
                                            $_SESSION["rest"] = $rest;
                                        }
                                    ?> 
                                    kr
                                </h1>
                                <h4>Summan:</h4>
                                <h1>
                                    <?php 
                                        echo $_SESSION["sum"];
                                    ?> kr
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 d-flex justify-content-center align-items-center">
                        <div class="col-sm-6 order-md-2 text-right">
                            <form action="#" method="POST">
                                <input type="submit" name="sumbit" class="btn btn-primary mb-4 btn-lg pl-5 pr-5"></input>
                                <div class="">
     				                <button class="btn btn-login text-uppercase fw-bold text-white mt-3" name="swish" type="submit">Swish</button>
        		                </div>
                                <div>
                	                <input type="text" name="kontVal">
                                    <button class="btn btn-login text-uppercase fw-bold text-white mt-3" name="kontant" type="submit">Kontant</button>
        		                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                        <a href="Kassa.php"><i class="fas fa-arrow-left mr-2"></i>Lägg till fler</a>
                    </div>
                    </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>

<?php 
$method = "";
    if (isset($_POST['submit'])) {
        include "../Backend/databaseHandler.php";
        $sum = $_SESSION["sum"];
        

        if (isset($_POST['cash'])) {
            $method = "cash";
        }
        else if (isset($_POST['swish'])){
            $method = "swish";
        }
        $sqlMakePayment = "INSERT INTO Payment (product_name, amount_sold, payment_method, Total_Sum) VALUES ('Payment', 0, '$method', $sum)";

        $payment= mysqli_query($conn, $sqlMakePayment);

        
    }

    
    if (isset($_POST["swish"])){
        $method = "swish";
    }

?>