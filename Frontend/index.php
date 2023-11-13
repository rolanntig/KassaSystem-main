<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./Styles/kassa.css"> 
    <title>Login</title>
</head>
<body id="loginBody">
  	<div class="container">
    	<div class="row ">
      		<div class="col-sm-9 col-md-7 col-lg-5  mx-auto">
        		<div class="card border-0 shadow rounded-3 br1em mt-5">
          			<div class="card-body p-4 p-sm-5">
            			<h5 class="card-title text-center mb-5 fw-light fs-5">Logga in</h5>
            			<form action="#" method="POST" name="otherForm">
              				<div class="form-floating mb-3">
                				<label for="floatingInput">Användarnamn</label>
                				<input type="text" class="form-control" id="floatingInput" minlength="2 " required name="username" minlength="5" required placeholder="Användarnamn">
              				</div>
              				<div class="form-floating mb-3">
                				<label for="floatingPassword">Lösenord</label>
                				<input type="password" class="form-control" minlength="6" required id="floatingPassword" name="pass" minlength="6" required  placeholder="Lösenord">
              				</div>
              				<div class="form-check mb-3">
                				<input class="form-check-input" type="checkbox" id="rememberPasswordCheck">
                				<label class="form-check-label" for="rememberPasswordCheck">
                  					Kom ihåg lösenord
                				</label>
              				</div>
              				<div class="d-flex justify-content-center">
                				<button class="btn btn-login text-uppercase fw-bold text-white mt-3" name="submit" type="submit">Logga in</button>
              				</div>
            			</form>
          			</div>
        		</div>
                <?php include '../Backend/user_Controll.php'; ?>
      		</div>
    	</div>
  	</div> 
</body>
</html>
