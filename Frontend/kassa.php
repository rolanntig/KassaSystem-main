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
				<select name="category" id="category">
					<option value="">Allt</option>
					<option value="dryck">Dryck</option>
					<option value="snacks">Snacks</option>
					<option value="mat">Mat</option>
					<option value="verktyg">Verktyg</option>
				</select>
			</div>
			<!-- sample pictures REMOVE LATER -->
				<a href="#"><img src="https://static.openproductsfacts.org/images/products/505/189/323/8136/front_es.3.full.jpg" alt="fortnint" width="150"></a>
				<a href="#"><img src="https://static.openproductsfacts.org/images/products/505/189/323/8136/front_es.3.full.jpg" alt="fortnint" width="150"></a>
				<a href="#"><img src="https://static.openproductsfacts.org/images/products/505/189/323/8136/front_es.3.full.jpg" alt="fortnint" width="150"></a>
				<a href="#"><img src="https://static.openproductsfacts.org/images/products/505/189/323/8136/front_es.3.full.jpg" alt="fortnint" width="150"></a>
				<a href="#"><img src="https://static.openproductsfacts.org/images/products/505/189/323/8136/front_es.3.full.jpg" alt="fortnint" width="150"></a>
				<a href="#"><img src="https://static.openproductsfacts.org/images/products/505/189/323/8136/front_es.3.full.jpg" alt="fortnint" width="150"></a>
				<a href="#"><img src="https://static.openproductsfacts.org/images/products/505/189/323/8136/front_es.3.full.jpg" alt="fortnint" width="150"></a>
				<a href="#"><img src="https://static.openproductsfacts.org/images/products/505/189/323/8136/front_es.3.full.jpg" alt="fortnint" width="150"></a>
				<a href="#"><img src="https://static.openproductsfacts.org/images/products/505/189/323/8136/front_es.3.full.jpg" alt="fortnint" width="150"></a>
				<a href="#"><img src="https://static.openproductsfacts.org/images/products/505/189/323/8136/front_es.3.full.jpg" alt="fortnint" width="150"></a>
				<a href="#"><img src="https://static.openproductsfacts.org/images/products/505/189/323/8136/front_es.3.full.jpg" alt="fortnint" width="150"></a>
				<a href="#"><img src="https://static.openproductsfacts.org/images/products/505/189/323/8136/front_es.3.full.jpg" alt="fortnint" width="150"></a>
				<a href="#"><img src="https://static.openproductsfacts.org/images/products/505/189/323/8136/front_es.3.full.jpg" alt="fortnint" width="150"></a>
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
				<form action="#">
					<div>
						<label for="swish">Swish</label>
						<input type="radio" name="swish" id="swish" checked>
					</div>
					<div>
						<label for="kontant">Kontant</label>
						<input type="radio" name="swish" id="kontant">
					</div>
				</form>
				<div id="swishDiv">

					<p>något annat</p>


				</div>
				<div id="kontantDiv">

					<p>spelar ingen roll</p>

				</div>
			</div>
			
		</div>
	</div>
	<script src="../Scripts/selectCategory.js"></script>
</body>
</html>