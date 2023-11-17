<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'credentials.php';
include '../Backend/console.php';
include '../Backend/databaseHandler.php';

if (isset($_POST['submit'])) {
    try {
        $adminUserName = $_POST['username'];
        $adminUserPass = $_POST['pass'];

        $query = "SELECT * FROM Admin WHERE username = '$adminUserName'";
        $adminUserCheck = DatabaseHandler::fetchData($query, DatabaseHandler::dbconnect());

        if ($adminUserCheck !== false) {
            if (mysqli_num_rows($adminUserCheck) > 0) {
                $adminCheckData = mysqli_fetch_assoc($adminUserCheck);

                if (isset($adminCheckData['password']) && !empty($adminCheckData['password'])) {
                    //verifies password
                    if (password_verify($adminUserPass, $adminCheckData['password'])) {
                        echo '<div class="card border-0 shadow rounded-3 br1em mt-5 text-center bg-success text-white w-50 mx-auto align-middle">
                                <script>
                                    console.log("Login successful")
                                </script>
                            </div>';

                        $_SESSION["inloggad"] = true;

                        $query = "UPDATE Admin SET last_login=now() WHERE username = '$adminUserName'";
                        $adminUserCheck = DatabaseHandler::fetchData($query, DatabaseHandler::dbconnect());

                        header("Refresh:2; url=admin.php");
                        exit;
                    } else {
                        console("Password does not match!");
                        echo '<div class="card border-0 shadow rounded-3 br1em mt-5 text-center bg-danger text-white w-50 mx-auto align-middle">
                                <p class="login-fail">
                                    Incorrect username or password
                                </p>
                            </div>';
                    }
                } else {
                    // Handle the case where the password field is null or empty
                    console("Password field is null or empty!");
                }
            } else {
                console("No rows fetched for the given username!");
                echo '<div class="card border-0 shadow rounded-3 br1em mt-5 text-center bg-danger text-white w-50 mx-auto align-middle">
                        <p class="login-fail2">
                            Incorrect username or password
                        </p>
                    </div>';
            }
        } else {
            console("Query execution failed or no results returned!");
            // Handle query execution failure or no results returned
        }
    } catch (\Throwable $th) {
        console($th->getMessage());
        console($th->getCode());
        console($th->getLine());
    }
}
?>
<style>
    .login-fail {
        position: absolute;
        top: 90px;
        right: 41.5%;
        padding: 15px;
        margin: 5px;
        border-radius: 9px;
        background-color: red;
    }

    .login-fail2 {
        position: absolute;
        top: 90px;
        right: 41.5%;
        padding: 15px;
        margin: 5px;
        border-radius: 9px;
        background-color: red;
    }
</style>
