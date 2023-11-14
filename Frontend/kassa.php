<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kassa</title>
	<link rel="stylesheet" href="./Styles/kassa.css">
</head>
<body>
	<!-- add header -->
	<!-- container -->
	<div class="fullDiv">
		<!-- left container -->
		<div class="leftDiv">
			<!-- container where items show -->
			<div class="itemContainer">
			<div class="categoryDiv">
				<select name="category" id="category" >
					<option value="">Allt</option>
					<option value="drink">Dryck</option>
					<option value="snacks">Snacks</option>
					<option value="food">Mat</option>
					<option value="verktyg">Verktyg</option>
				</select>
			</div>
				<?php
					include '../Backend/kassa_items.php';
				?>
			</div>
		</div>
		<!-- right container -->
		<div class="rightDiv">
			<div class="cart">
				<div class="cartItem">COLA</div>
				<div class="cartItem">COLA</div>
				<div class="cartItem"><p>COLAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</p></div>
				<div class="cartItem">COLA</div>
				<div class="cartItem">COLA</div>

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

						<p>något annat</p>

					</div>
					<div id="kontantDiv">
						
						<p>adkjaldkjalkd</p>

					</div>
				</form>
				
			</div>
			
		</div>
	</div>
	<script src="../Scripts/selectCategory.js"></script>
	<script src="../Scripts/kassa_radioHide.js"></script>
</body>
</html>