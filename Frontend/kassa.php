<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kassa</title>
	<link rel="stylesheet" href="./Styles/kassa.css">
	<link rel="stylesheet" href="./Styles/main.css">
</head>
<body>
	<!-- add header -->
	<?php include "../Backend/header.php"?>
	<!-- container -->
	<div class="fullDiv">
		<!-- left container -->
		<div class="leftDiv">
			<!-- container where items show -->
			<div class="itemContainer">
			<form class="categoryForm" onsubmit = "return(p)">
				<select name="category" id="category" >
					<option value="">Allt</option>
					<option value="drink">Dryck</option>
					<option value="snacks">Snacks</option>
					<option value="food">Mat</option>
					<option value="verktyg">Verktyg</option>
				</select>
				<input type="text" name="barcode" id="barcode" placeholder="BARCODE">
			</form>
				<?php
					include '../Backend/kassa_items.php';
				?>
			</div>
		</div>
		<!-- right container -->
		<div class="rightDiv">
			<div class="cart">
			<?php 
        		$id = $_POST['item'];
        		if ( isset($_POST['item'])){
        		   include '../Backend/kassa_cart.php';
        		}
    			?>
			</div>
			<div class="Empty-btn">
			<form action="" method="POST">
    			<button name="close">
    			    Empty Cart
    			</button>
    			</form>
    			<?php 
    			    if(isset($_POST['close'])){
    			        session_destroy();
    			        unset($_SESSION['cart']);
    			        print_r($_SESSION['cart']);
    			    }
    			?>
			</div>
			<div class="payment">
				<form action="#" id="swishKonForm">
					<div id="buttonDiv">
						<div>
							<label for="swish">Swish</label>
							<input type="radio" name="swish" id="swish" checked>
						</div>
						<div>
							<label for="kontant">Kontant</label>
							<input type="radio" name="swish" id="kontant">
						</div>
					</div>
					<div id="swishDiv">

						<div class="">
						    <h4>
						        <?php
						        global $finalPrice;
						        echo "$finalPrice";
						        echo " " ."kr :-";
						        ?>
						    </h4>
						</div>

					</div>
					<div id="kontantDiv">
						
						<div class="">
						    <h4>
						        <?php
						        global $finalPrice;
						        echo "$finalPrice";
						        echo " " ."kr :-";
						        ?>
						    </h4>
						</div>
						<div>
							Ger: 80kr
						</div>
						<div>
							tillbaka:30kr
						</div>

					</div>
				</form>
				
			</div>
			
		</div>
	</div>
	<script>var p = false;</script>
	<script src="../Scripts/kassa_select_item"></script>
	<script src="../Scripts/kassa_radioHide.js"></script>
</body>
</html>