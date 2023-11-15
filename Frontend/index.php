<?php
  session_start();
  	if($_SESSION["inloggad"]){
		header("location:admin.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./Styles/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./Styles/kassa.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./Styles/login.css"> 
    <title>Login</title>
</head>
<body id="loginBody">
  	<div class="container">
		<div class="box">
			<div class="login">
			<form action="#" method="POST">
				<div class="names">
					<input type="text" id="username" placeholder="Användarnamn" class="inputs" name="username" required>
				</div>
				<div class="password-container">
					<input type="password" id="password" placeholder="Lösenord" class="inputs" name="pass" required>
					<i class="fa-solid fa-eye" id="eye"></i>
				</div>
				<div class="submit-btn">
					<input type="submit" value="Sign in" id="sign-in" name="submit">
				</div>
			</form>	
			</div>
		</div>
			<?php include '../Backend/user_Controll.php'; ?>
    	</div>
  	</div> 

	<script src="../Scripts/index.js"></script>
</body>
</html>
