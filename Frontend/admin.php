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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./Styles/navbar.css">
    <link href="./Styles/admin-style.css"  type="text/css" rel="stylesheet" >
	<!-- <link rel="stylesheet" type="text/css" href="./Styles/kassa.css"> -->
	<link rel="stylesheet" type="text/css" href="./Styles/rapport.css">
	<script defer src="../Scripts/admin.js"></script>
    <title>Admin</title>
</head>
<body>
    <?php include "../Backend/userAdd.php"; ?>

	<?php include "../Backend/header.php" ?>


    <!-- Main container  -->
    <div class="container-fluid d-flex gap-3 p-5  border-primary flex-wrap border">

        <!--Registerara Kassör-->
        <div class="card-body border ">  
            <!-- Registera form -->
            <form  method="POST" name="otherForm" class="bg-light p-1">
                <h2 class="text-center">Registrera kassör</h2>
                
                <!-- Input för användarnamn -->
                <div class="mb-3">
				    <label  class="form-label" for="floatingInput">Användarnamn</label>
					<input type="text" class="form-control" id="floatingInput" name="username" minlength="5" required placeholder="Användarnamn">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>

                <!-- input för lösenord -->
                <div class="mb-3">
				    <label class="form-label" for="floatingPassword">Lösenord</label>
					<input type="password" class="form-control" id="floatingPassword" name="pass" minlength="6" required placeholder="Lösenord">
                </div>
                 
                <!-- input för lösenord kontroll -->
				<div class=" mb-3">
					<label  class="form-label" for="floatingPasswordCheck">Lösensord Kontroll</label>
					<input type="password" class="form-control" id="floatingPasswordCheck" name="pass2" minlength="6" required placeholder="Lösenord (igen)">

					<!-- Kom i håg lösenord i registrering av kassör? Varför? Sparar dock koden ifall att -->
					<!-- <input class="form-check-input" type="checkbox" id="rememberPasswordCheck">
					<label class="form-check-label" for="rememberPasswordCheck">
						Kom ihåg lösenord
					</label> -->
				</div><br>
				<button class="btn btn-login  bg-primary text-uppercase fw-bold text-white position-relative top-50 start-50 translate-middle" name="submit" type="submit">Register</button>
            </form>

            <!-- Lista över registrerade kassörer -->
            <div class="con overflow-y-scroll bg-light ">
                <table class="table table-light table-borderless  ">
                    <thead>
                        <tr>
                           <th scope="col">Användarnamn</th>
                           <th scope="col">Lösenord</th>
                           <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <td>Gustav@gmail.com</td>
                           <td id="cell">Test1234</td>
                           <td>
                           <button class="btn btn-primary" id="editBtn">Edit</button>  
                           <button class="btn btn-danger" id="deleteBtn">Delete</button> 
                           <button class="btn btn-success" id="showBtn">Show</button> 
                           </td>
                        </tr>
                        <tr>
                           <td>Gunnar_eriksson@gmail.com</td>
                           <td>SommarSol1234</td>
                           <td>
                           <button class="btn btn-primary">Edit</button>  
                           <button class="btn btn-danger">Delete</button> 
                           <button class="btn btn-success" id="showBtn">Show</button> 
                           </td>                                               
                        </tr>
                        <tr>
                           <td>Gunnar_eriksson@gmail.com</td>
                           <td>SommarSol1234</td>
                           <td>
                           <button class="btn btn-primary">Edit</button>  
                           <button class="btn btn-danger">Delete</button> 
                           <button class="btn btn-success" id="showBtn">Show</button> 
                           </td>                                               
                        </tr>
                        <tr>
                           <td>Gunnar_eriksson@gmail.com</td>
                           <td>SommarSol1234</td>
                           <td>
                           <button class="btn btn-primary">Edit</button>  
                           <button class="btn btn-danger">Delete</button> 
                           <button class="btn btn-success" id="showBtn">Show</button> 
                           </td>                                               
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <!--Lista över produkter-->
        <div class="card-body overflow-y-scroll  bg-light border p-2">     
           <h2 class="text-center">Produkter</h2>
           <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">Produkter</th>
                        <th scope="col">Antal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						include "../Backend/credentials.php";

						// DO NOT USE CONSOLE.PHP OVER AND OVER! IT KEEPS RE-DECLAIRING!!!!
						//include "../Backend/console.php";

						$conn = new mysqli($server, $username, $password, $dbname, $port);
						try {
							$sqlGetProduct = 'SELECT * FROM Products';
							$products = mysqli_query($conn, $sqlGetProduct);
							//fetches all products from database
							while ($row = mysqli_fetch_assoc($products)) {
								echo '<tr>';
								echo '<td>' . $row['product_name'] . '</td>';
								echo '<td>' . $row['amount'] . '</td>';
								echo '</tr>';
							}

							mysqli_close($conn);
						} catch (\Throwable $th) {
							console($th->getMessage());
							console($th->getLine());
						}
					?>
                </tbody>
            </table>
        </div>

         
        <!-- rapport -->
        <div class="container-fluid">
            <a href="rapport.php">
			    <div class="bg-white bg-primary d-flex justify-content-around align-items-center p-3" id="Rapport">
				    <div class="col-5  text-center p-3 my-auto fs-2" id="summary-idag">
					   <?php
						   include "../Backend/getRapport.php";
						   getDailyRapport();
					    ?>
				    </div>
			     	<div class="col-5 text-center p-3 my-auto fs-2" id="summary-manad">
					    <?php
				        	getMonthlyRapport();
				     	?>
				    </div>
			    </div>
		    </a>
        </div>


       
        <!--Lista över rapport-->
        <!-- <div class="container-fluid overflow-y-scroll border p-2">      
            <div class="container rapport-con">
                <div>
                    <h2 class="text-center">Månadens kassa</h2>
                    <table class="table overflow-y-scroll">
                        <thead>
                            <tr>
                                <th scope="col">Månad</th>
                                <th scope="col">Kontant</th>
                                <th scope="col">Swish</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Januari</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Februari</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Mars</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <h2 class="text-center">Dagens kassa</h2>
                    <table class="table overflow-y-scroll">
                        <thead>
                            <tr>
                                <th scope="col">Datum</th>
                                <th scope="col">Kontant</th>
                                <th scope="col">Swish</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1970/1/1</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>1970/1/1</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>1970/1/1</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <h2 class="text-center">Stuff</h2>
                    <table class="table overflow-y-scroll">
                        <thead>
                            <tr>
                                <th scope="col">Nr</th>
                                <th scope="col">Produkter</th>
                                <th scope="col">Antal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Celcius</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Kaffe</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Marabo</td>
                                <td>10</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class ="flex-wrap d-flex rapport-con-buttons">
                <button class="btn btn-primary">Skriv ut</button>
                <button class="btn btn-primary">Skriv ut</button>
                <button class="btn btn-primary">Skriv ut</button>
            </div>
        </div> -->

    </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   <script src="https://kit.fontawesome.com/1b0280e235.js" crossorigin="anonymous"></script>
</body>
</html>