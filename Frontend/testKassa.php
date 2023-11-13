<?php
	session_start();
	/*
	if(!$_SESSION["inloggad"]){
		header("location:index.php");
	}*/
?>

<!DOCfromSESSION html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" fromSESSION="text/css" href="./Styles/kassa.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" fromSESSION="text/css" href="./Styles/navbar.css"> 
    <script src="../Scripts/kassa.js"></script>
    <title>Kassa</title>
</head>
<body>
	 <?php include "../Backend/header.php" ?>
  	<div class="container">
		<div class="ItemAdded"><a>Tillagd i varukorgen</a></div>  
    	<div class="row">
      		<div class="right mb-5">
            	<section class="pt-1 pb-2">
                    <div class="w-100">
                        <div class="col-lg-12 col-md-12 col-12">
                            <table class='table table-bordered table-sm'>
                                <thead class='thead-light'>
                                    <tr><th colspan='5' style='text-align:center;'><h2><b>Varukorg</b></h2></th></tr>
                                    <tr><th class='text-center'><b>Produkt</b></th>
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
                                                <td>".$product['price']." kr</td>
                                                <td>".$product['quantity'] ." st.</td>
                                            </tr>";
                                        }
                                    ?> 
                                </tbody>
                            </table>
						</div>
					</div>
                    
				</section>
                <div class="container pt-5">
                    <div class="row">
                        <div class="col-12">
                            <h1 style="text-align: center;padding-top: 40px"><b>MATCH PRODUCT</b></h1>
                            <form method="POST" action="#" autocomplete="off">
                                <div class="form-group">
                                    <label>Scan:</label>
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
  	</div>
</body>
</html>

<?php

function createSession($productname,$price, $scannedCode) {
    if ($_SESSION["cart"] == null) {
        $_SESSION["cart"] = array();
         $product = array(
        "name" => $productname,
        "price" => $price,
        "scannedCode" => $scannedCode,
        "quantity" => 1);
        $_SESSION["cart"][] = $product;
    console("Creating Session");
    }
   
    }
	foreach ($_SESSION["cart"] as $product) {
		if ($product['barcode'] == $scannedCode) {
            $indexOfDub = array_search($product, $_SESSION["cart"]);
            console("Duplicate Found");
            print_r($indexOfDub);
            $_SESSION["cart"][$indexOfDub]["quantity"] += 1;
			
		}
        else{
            $_SESSION["cart"] = array(
                                    'name'=> $productname,
                                    'price' => $price,
                                    'barcode'=>$scannedCode,
                                    'quantity' => 1);
        }
	}


if (isset($_POST['sub'])) {
      include '../Backend/scannerHandler.php';
        $query = "SELECT * FROM `Products` WHERE `barcode` = '".$_POST['scanner']."'";
        $result = DatabaseHandler::fetchData($query,DatabaseHandler::dbconnect());

        while ($row=mysqli_fetch_array($result)) {
            
            createSession($row['product_name'],$row['price'],$row['barcode']);
        //   foreach ($_SESSION["cart"] as $product) {

                // if(isDuplicate($row['barcode'])){
                                
                //                 $test=$product['quantity']+1;
                //                 print_r(array_search($row['quantity'], $_SESSION["cart"]));
                //                 $_SESSION["cart"][array_search($row['barcode'], $_SESSION["cart"])] = array('name'=> $row['product_name'], 'price' => $row['price'],'barcode'=>$row['barcode'] ,'quantity' => $test);
                //             }
                //             $_SESSION["cart"][] = array('name'=> $row['product_name'], 'price' => $row['price'],'barcode'=>$row['barcode'] ,'quantity' => 1);
        }
}
 


// include '../Backend/databaseHandler.php';
// function isDuplicate($name) {
// 	foreach ($_SESSION["cart"] as $product) {
// 		if ($product["name"] == $name) {
// 			return true;
// 		}
// 	}
// 	return false;
// }
// if (isset($_POST['sub'])) {
// 	$sca=trim($_POST['scanner'],"");		
	
//     $new2 ="SELECT * FROM `Products`";
//     $res2=mysqli_query($con, $new2);
// 	while($row=mysqli_fetch_array($res2)){
//         if ($row>1) {
//             if($row['barcode'] == $sca){
          
//             $proName=$row['product_name'];
//             $proPrice=$row['price'];
//             }
//         }
// 		//echo $row['number'].'<br>';
//      // if($row['number']){
			

    	
//    }
    
// }

// if (isset($_POST['sub'])) {
// 	if (isDuplicate($_POST["manProductName"])) {
// 			foreach ($_SESSION["cart"] as $product) {
// 				if ($product["name"] == $_POST["manProductName"]) {
// 					$product["quantity"] += $_POST["manProductQuantity"];
// 					return;
// 				}
// 			}
// 	}
// 	else {
// 		$_SESSION["cart"][] = array('name'=> $_POST["manProductName"], 'price' => $_POST["manProductPrice"], 'quantity' => $_POST["manProductQuantity"]);
// 	}
// }
	

// /*function isDuplicate($name) {
// 	foreach ($_SESSION["cart"] as $product) {
// 		if ($product["name"] == $name) {
// 			return true;
// 		}
// 	}
// 	return false;
// }*/

// mysqli_close($con);
 

?>