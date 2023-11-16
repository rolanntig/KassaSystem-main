<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kassa</title>
	<link rel="stylesheet" href="./Styles/kassa.css">
	<link rel="stylesheet" href="./Styles/main.css">
	<script src="https://kit.fontawesome.com/f5139ef0fc.js" crossorigin="anonymous"></script>
	<!-- add header -->
	<?php include "../Frontend/header.php"?>
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
				<div class="cartDiv">
					<table>
						<?php 
						echo '<tr>' .'<th>' .'ITEMS' .'</th>' .'<th>' .'PRICES' .'</th>' .'<th>' .'AMOUNT' .'</th>' .'</tr>';
						$id = $_POST['item'];
						if ( isset($_POST['item'])){
						include '../Backend/kassa_cart.php';
						}if(isset($_POST['rm-item'])){
							$_SESSION['cart'] = array_filter($_SESSION['cart'], function($v) { return $v != $_POST['rm-item']; });
							include '../Backend/kassa_backend.php';
						}
						?>
					</table>
				</div>
					<div class="Empty-btn">
				<form action="" method="POST">
					<button name="close" class="emptyBtn">
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
			</div>
			<div class="payment">
				<form action="#" id="swishKonForm" method="POST">
					<div id="buttonDiv">
						<div>
							<label for="swish">Swish</label>
							<input type="radio" name="radio-btn" id="swish" checked value="Swish">
						</div>
						<div>
							<label for="kontant">Kontant</label>
							<input type="radio" name="radio-btn" id="kontant" value="Kontant">
						</div>
					</div>
					<div id="swishDiv">

						<div class="cartDiv">
						    <h4>
						        <?php
						        global $finalPrice;
						        echo "$finalPrice";
						        echo " " ."kr :-";
						        ?>
						    </h4>
						</div>
						<button name="checkout-btn">
							Checkout
						</button>
					</div>
					<div id="kontantDiv">
						
						<div>
						    <h4 id="cost">
						        <?php
						        global $finalPrice;
								echo "<p id='price'>"."$finalPrice"." kr :-</p>";
						        ?>
						    </h4>
						</div>
						<div>
							Ger: <input type="text" name="tillbaka" id="payed">
						</div>
						<p id="payBack"></p>

						
						<button class="checkout-btn" name="checkout-btn">
							Checkout
						</button>
						<?php include'../Backend/kassa_checkout.php'?>
					</div>
				</form>
			</div>
			
		</div>
	</div>
	<!-- script to cancel sumbit for barcode and category select -->
	<script>var p = false;</script>
	<script src="../Scripts/kassa_select_item.js"></script>
	<script src="../Scripts/kassa_radioHide.js"></script>
	<script src="../Scripts/kassa_money_back.js"></script>
</body>
</html>