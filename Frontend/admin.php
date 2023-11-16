<?php
// Checks if session has a logged in varaible, currently not working
/*session_start();
	if(!$_SESSION["inloggad"]){
		header("location:index.php");
	}
	*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Styles/main.css">

    <!-- <link rel="stylesheet" type="text/css" href="./Styles/navbar.css"> -->
    <!-- Dont know why kassa.css was linked so commented it away for now atleast -->
    <!-- <link rel="stylesheet" type="text/css" href="./Styles/kassa.css"> -->
    <link rel="stylesheet" type="text/css" href="./Styles/rapport.css">
    <link href="./Styles/admin-style.css" type="text/css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script defer src="../Scripts/admin.js"></script>
    <title>Admin</title>
</head>

<body>
    <!-- Adds some php files for future function and varaible uses -->
    <?php include "../Backend/userAdd.php"; ?>
    <?php include "../Backend/getAllForAdmin.php"; ?>
    <?php include "../Frontend/header.php" ?>

    <?php
    if(isset($_GET['deleteBtn'])){
        removeCashiers($_GET['deleteBtn']);
    }
    ?>

    <!-- Main container  -->
    <div class="container-fluid d-flex gap-3 p-5 flex-wrap">

        <!--Div for registation of cashier-->
        <div class="card-body ">
            <!-- Form for registraion -->
            <form method="POST" id="otherForm" name="otherForm" class="bg-light p-1 rounded-top">
                <h2 class="text-center">Registrera kassör</h2>

                <!-- Input for username -->
                <div class="mb-3">
                    <label class="form-label" for="floatingInput">Användarnamn</label>
                    <input type="text" class="form-control" id="floatingInput" name="username" minlength="5" required placeholder="Användarnamn">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>

                <!-- input for password -->
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input class="form-control" id="floatingPassword" name="floatingPassword" placeholder="Lösenord" type="password" value="">
                    <span class="input-group-text eye" id="eye"><i class="far fa-eye-slash" id="togglePassword"></i></span>
                </div>

                <!-- input for checking such that passwords match -->
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input class="form-control" id="floatingPasswordCheck" name="floatingPasswordCheck" placeholder="Lösenords kontroll" type="password" value="">
                    <span class="input-group-text eye" id="eyeCheck"><i class="far fa-eye-slash" id="togglePasswordCheck"></i></span>
                </div><br>
                <button class="btn btn-login  bg-primary text-uppercase fw-bold text-white position-relative top-50 start-50 translate-middle" name="submit" type="submit">Register</button>
            </form>
            <!-- List of all registred cashiers -->
            <div class="con overflow-y-scroll bg-light  rounded-bottom">
                <table class="table table-light table-borderless cashierTable" style="text-align: start;">
                    <thead>
                        <tr>
                            <th scope="col">Användarnamn</th>
                            <th scope="col">Last login</th>
                            <th scope="col">Reg Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Selects all accounts from the table Admin in the databaase
                        $persons = connectToDb("SELECT * FROM Admin");
                        if ($persons != NULL) { // Checks so its not null, otherwise print no logins
                            getCashiers($persons);
                        } else {
                            echo "<tr><td>No logins!</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- List of all products -->
        <div class="card-body overflow-y-scroll  bg-light border rounded p-2">
            <a href="../Frontend/produkter.php" class="productTable rounded">
                <h2 class="text-center">Produkter</h2>
                <table class="table rounded ">
                    <thead>
                        <tr>
                            <th scope="col">Produkter</th>
                            <th scope="col">Antal</th>
                            <th scope="col">Pris</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        // Breaking?? WHY???
                        //include "../Backend/credentials.php";

                        $server = "mysql.jawad.se";
                        $username = "kassa";
                        $password = "cGZZ2.I2mYPE*T@p";
                        $dbname = "kassa";
                        $port = 80;
                        // Connects to the database and gets all products in it by sending a connection
                        // to a function getAllProductsAdmin()
                        $conn = new mysqli($server, $username, $password, $dbname, $port);

                        getAllProductsAdmin($conn);
                        ?>
                    </tbody>
                </table>
            </a>
        </div>


        <!-- Rapport of income during day/month -->
        <div class="container-fluid rounded">
            <a  class= "link " href="rapport.php">
                <div class="bg-white bg-primary d-flex justify-content-around align-items-center rounded p-3" id="Rapport">
                    <div class="col-5  text-center p-3 my-auto fs-2" id="summary-idag">
                        <?php
                        getDailyRapport();
                        ?>
                    </div>
                    <div class="col-5 text-center p-3 my-auto fs-2 rounded " id="summary-manad">
                        <?php
                        getMonthlyRapport();
                        ?>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Links some of the used javascript files -->
    <script src="../Scripts/passwordEye.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1b0280e235.js" crossorigin="anonymous"></script>
</body>

</html>