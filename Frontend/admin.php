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
    <script defer src="../Scripts/admin.js"></script>
    <title>Admin</title>
</head>
<body>
  <?php include "../Backend/header.php" ?>
	<div class="container">
  		<div id="justify-content">
  			<div class="bg-white border" id="Registrera-Kassör">
  				<div class="card-body p-2 p-sm-3">
    				<h5 class="card-title text-center mb-5 fw-light fs-5">Registrera Kassör</h5>
        			<form action="#" method="POST" name="otherForm">
        				<div class="form-floating mb-3">
            				<label for="floatingInput">Användarnamn</label>
            				<input type="text" class="form-control" id="floatingInput" name="username" minlength="5" required placeholder="Användarnamn">
          				</div>
              			<div class="form-floating mb-3">
            				<label for="floatingPassword">Lösenord</label>
                			<input type="password" class="form-control" id="floatingPassword" name="pass" minlength="6" required  placeholder="Lösenord">
              			</div>
        				<div class="form-check mb-3">
            				<input class="form-check-input" type="checkbox" id="rememberPasswordCheck">
            				<label class="form-check-label" for="rememberPasswordCheck">
                  		  		Kom ihåg lösenord
                			</label>
              			</div>
              			<div class="d-flex justify-content-center">
                			<button class="btn btn-login text-uppercase fw-bold text-white" name="submit" type="submit">Register</button>
              			</div>
            		</form>
          		</div>
  			</div>
			<a href="produkter.php">
  				<div class="bg-white border"  id="Produkter">
				  	<h5 class="mb-4 mt-3 text-center fw-light fs-5">Produkter</h5>
            		<table id="produkterKvar" class="table">
                		<thead>
                    		<tr>
                        		<th scope="col">Produkt</th>
                        		<th scope="col">Antal</th>
                    		</tr>
                		</thead>
                		<?php
                    		include "../Backend/credentials.php";
							include "../Backend/console.php";
							$conn = new mysqli($server, $username, $password, $dbname,$port);
                    		try {
                       	 		$sqlGetProduct = 'SELECT * FROM Products';
                        		$products= mysqli_query($conn, $sqlGetProduct);
                        		//fetches all products from database
                        		while($row = mysqli_fetch_assoc($products)){
                            		echo '<tr>';
                            		echo '<td>'.$row['product_name'].'</td>';
                            		echo '<td>'.$row['amount'].'</td>';
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
			</a>
		</div>
		<a href="rapport.php">
    		<div class="bg-white border d-flex justify-content-around align-items-center p-3" id="Rapport">
                <div class="col-5 text-center p-3 my-auto fs-2" id="summary-idag">
					<!-- Kod för dag -->
					<?php
				        include "../Backend/getSummary.php"; 
                    ?>
					<!--Kod från rapport sidan-->
					<?php /*
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
                            */
                    ?>
				</div>
                <div class="col-5 text-center p-3 my-auto fs-2" id="summary-manad">
					<!--Kod för månad-->

					<!--Kod från rapport sidan-->
					<?php
                        /*try {
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
                        }    */                 
                    ?>
				</div>
			</div>
		</a>
	</div>
	<?php
		include "../Backend/userAdd.php";
	?>
</body>
</html>
