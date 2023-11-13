<?php
	session_start();
	/*
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
    <link rel="stylesheet" type="text/css" href="./Styles/kassa.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./Styles/navbar.css"> 
    <script src="../Scripts/kassa.js"></script>
    <title>Kassa</title>
</head>
<body>
	 <?php include "../Backend/header.php" ?>
  	<div class="container">
	  	<div class="container mb-5 bg-white br1em" style="height: 70vh;">
		  	<!--produkter div-->
			<div class="row top-br1em" id="kassa-div" style="height: 85%;">
				<table class='table table-bordered table-sm top-br1em'>
                    <thead class='thead-light'>
                        <tr>
							<th colspan='5' style='text-align:center;'><h2><b>Varukorg</b></h2></th>
						</tr>
                        <tr>
							<th class='text-center'><b>Produkt</b></th>
                            <th class='text-center'><b>Pris</b></th>
                            <th class='text-center'><b>antal</b></th>
                        </tr>
                    </thead>
                	<tbody>
                        <?php 
                        	include '../Backend/console.php';
                            include '../Backend/databaseHandler.php';
                            //Fetch data from session
                            foreach ($_SESSION["cart"] as $product){
                                echo "<tr align='center'>
                                    	<td>".$product['name']."</td>
                                    	<td>".$product['price']."</td>
                                    	<td>".$product['quantity'] ." st.</td>
                                	</tr>";
                            }
                        ?> 
                    </tbody>
                </table>
				<div class="col-10 mx-auto">
					<div class="container pt-5">
                    	<div class="row">
                        	<div class="col-12">
                            	<h1 style="text-align: center;padding-top: 40px"><b>MATCHA PRODUKT</b></h1>
                            	<form method="POST" action="#" autocomplete="off">
                                	<div class="form-group">
                                    	<label>Skanna:</label>
                                    	<input fromSESSION="text" id="no" name="scanner" class="form-control" autofocus style="opacity:1;">
                               	 	</div>
                                	<div class="d-flex flex-row justify-content-center">
                                    	<input class="mx-2" fromSESSION="text" name="manProductName" placeholder="Namn">
                                    	<input class="mx-2" fromSESSION="text" name="manProductPrice" placeholder="Pris">
                                    	<input class="mx-2" fromSESSION="number" name="manProductQuantity" placeholder="Antal">
                                    	<input class="btn btn-info mx-2" name="sub" type="submit" style="opacity:1;"></input>
                                	</div>
                            	</form>
                        	</div>
                    	</div>
                	</div>
				</div>
			</div>		
			<div class="row bottom-br1em d-flex flex-row" style="background-color: rgb(121, 70, 146); height: 15%;">
				<div class="col-3 my-auto">
					<h1 class="text-white">
						<!-- Räknar ut summan-->
						Sum:
						<?php 
                            echo $_SESSION["sum"];
                        ?> kr<h1>
				</div>
				<!--Kontanter div-->
				<div class="col-5 my-auto d-flex justify-content-end">
					<!--Växel div-->
					<div class="d-flex flex-column mr-3">
						<h3 class="text-white">
							<!--Visar växel, hur mycket som ska ges tillbaka-->
							Rest: 50
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
						</h3>
					</div>
					<!-- input div-->
					<div class="d-flex flex-column mr-4">
						<input type="text" class="" onkeyup="" placeholder="Kunden ger.."><!--Hur mycket man får-->
						<button class="btn text-uppercase h-50 fw-bold mt-2 text-white" name="kassa-räkna" type="submit">Räkna</button>
					</div>	
					<!--Kontanter knapp div-->		
					<div class="my-auto">	
						<button class="btn text-uppercase my-auto fw-bold text-white" name="kontanter" type="submit">Kontanter</button>
					</div>			
				</div>
				<div class="col-2 my-auto d-flex justify-content-center">
					<button class="btn text-uppercase fw-bold text-white" name="swish" type="submit">Swish</button>
				</div>
				<div class="col-2 my-auto d-flex justify-content-center">
					<button class="btn text-uppercase fw-bold text-white py-3" name="kassa-registrera" type="submit"><p class="h5">Registrera</p></button>
				</div>
			</div>		
		</div>
<!--
		  <div class="flex-container">
		  <form action="#" method="POST">
								<div class="w">
     				                <button class="btn btn-login text-uppercase fw-bold text-white mt-3" name="swish" type="submit">Swish</button>
        		                </div>
                                <div class="w">
								<button class="btn btn-login text-uppercase fw-bold text-white mt-3" name="kontant" type="submit">Kontant</button>
                	                <input type="text" name="kontVal" class="mt-3">
        		                </div>
                            </form>
		  </div>
-->
		 <!-- <div class="row">
   			  <div class="col-xs">
     		  	<div class="box"><button type="button">Kontant</button></div>
  		  	</div>
				<div class="col-xs">
     		  	 <div class="box"><button type="button">Swish</button></div>
		</div> -->
		  
                    <!-- <input type="submit" name="sumbit" class="btn btn-primary mb-4 btn-lg pl-5 pr-5"></input>
                    <div class="">
     				    <button class="btn btn-login text-uppercase fw-bold text-white mt-3" name="swish" type="submit">Swish</button>
        		    </div>
                    <div>
                	    <input type="text" name="kontVal">
                        <button class="btn btn-login text-uppercase fw-bold text-white mt-3" name="kontant" type="submit">Kontant</button>
        			</div>

                </form>			
			</div>
		</div> -->


	  <!--
		<div class="ItemAdded"><a>Tillagd i varukorgen</a></div>  
    	<div class="row">
      		<div class="left">
        		<h2>Kategorier</h2>
        		<input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Sök.." title="Type in a category">
            	<ul id="myMenu">
            		<li><a href="#">Dryck</a></li>
              		<li><a href="#">Läsk</a></li>
              		<li><a href="#">Energidryck</a></li>
              		<li><a href="#">Kakor</a></li>
              		<li><a href="#">Godis</a></li>
              		<li><a href="#">Tuggumi</a></li>
              		<li><a href="#">Choklad</a></li>
              		<li><a href="#">Proteinbar</a></li>
            	</ul>
      		</div>
      		<div class="right mb-5">
            	<section class="pt-1 pb-2">
                    <div class="row w-100">
                        <div class="col-lg-12 col-md-12 col-12">
                            <h3 class="display-5 mb-2 text-center">Varukorg</h3>
                            <p class="mb-5 text-center">
                            <i class="text-info font-weight-bold"> <?php /*echo $_SESSION["index"] ?> </i> varor i din varukorg</p>
							<?php 
								include "../Backend/fetch_data.php"; 
								include "../Backend/Calculation.php";
							*/?>
                            <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                                <a href="Kassa.php"><i class="fas fa-arrow-left mr-2"></i>Lägg till fler</a>
                            </div>
						</div>
					</div>
				</section>
        	</div>
    	</div>-->
  	</div>
</body>
</html>
<?php
  	if(isset($_POST['btn'])){
    	console($_POST['product_name']);
  	}
?>

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

<!--
	Namn, pris, antal
	Varor som inte har streckkod i listan
	Registrera manuellt
	Scanna, kommer upp
	Visa totala priset längst ner
	Trycka på lappar
	K key kontant
	S key swish
-->