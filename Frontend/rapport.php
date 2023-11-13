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
                        include "../Backend/databaseHandler.php";
                        $totalamounttodayq = "select SUM(Total_Sum) from Payment where date(payment_date) = CURDATE()";
                        $totalamountdayswishq = "select SUM(Total_Sum) from Payment where date(payment_date) = CURDATE() and payment_method = 'Swish'";
                        $totalamountdaykontantq = "select SUM(Total_Sum) from Payment where date(payment_date) = CURDATE() and payment_method = 'Kontant'";
                       try {
                            function getDailySum($date,$paymentMethod,$getdailySum=false){
                             $sqlGetReport = "select SUM(Total_Sum) from Payment where date(payment_date) = CURDATE()";
                                if($getdailySum ==false){
                                   $sqlGetReport = $sqlGetReport." AND payment_method = '$paymentMethod'";
                                }
                            $sqlGetReport = DatabaseHandler::fetchData($sqlGetReport,DatabaseHandler::dbconnect());
                            return (mysqli_fetch_assoc($sqlGetReport)['SUM(Total_Sum)']); 
                        }
                            $totalSum = getDailySum("payment_date","",true); 
                            $amountCash = getDailySum('payment_date','Kontant',false);
                              if($amountCash == ""){
                                $amountCash = "0";
                            }
                            $amountSwish = getDailySum('payment_date','Swish',false);
                            echo "<div class='mb-4'><h2>Idag</h2></div>"
                            ."<div class='mb-4'><h1>Summa: ".$totalSum." kr</h1>"
                            ."<p>Swish: ".$amountSwish." kr</p>"
                            ."<p>Kontanter: ".$amountCash." kr</p></div>";
                       } catch (\Throwable $th) {
                           console($th->getMessage());
                           console($th->getLine());
                       }
                            
                    ?>
                </div>
                <div class="col-5 text-center p-5 mb-5 mt-5" id="pengar-manad">
                    <?php
                        try {
                            function getsummary($month,$paymentMethod,$getMonthlySum){
                                $sqlGetReport = "SELECT SUM(Total_Sum) FROM Payment WHERE monthname($month) = MONTHNAME(CURRENT_DATE) ";
                                if($getMonthlySum ==false){
                                   $sqlGetReport = $sqlGetReport." AND payment_method = '$paymentMethod'";
                                }
                            $sqlGetReport = DatabaseHandler::fetchData($sqlGetReport,DatabaseHandler::dbconnect());
                            return (mysqli_fetch_assoc($sqlGetReport)['SUM(Total_Sum)']); 
                           }
                        $totalSuma = getsummary("payment_date","",true);
                        $amountCash = getsummary('payment_date','Kontant',false);
                        $amountSwisha = getsummary('payment_date','Swish',false);
                      
                        echo "<div class='mb-4'><h2>Denna månad</h2></div>"
                        ."<div class='mb-4'><h1>Summa: ".$totalSuma." kr</h1>"
                        ."<p>Swish: ".$amountSwisha." kr</p>"
                        ."<p>Kontanter: ".$amountCash." kr</p></div>";
                        }
                        catch (\Throwable $th) {
                            console($th->getMessage());
                            console($th->getLine());
                        }                     
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>