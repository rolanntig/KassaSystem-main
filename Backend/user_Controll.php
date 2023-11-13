<?php
    //Error display settings. Ensures detailed reporting of errors if they exist.
    ini_set('display_errors', '0');
    error_reporting(E_ALL | E_STRICT);
                    
    include '../Backend/credentials.php';
    include '../Backend/console.php';
    include '../Backend/databaseHandler.php';
    

    //If submit button is pressed, following will happen.
    if(isset($_POST['submit'])) {
        try {
            //Gathers username and password for comparison.
            $adminUserName  = $_POST['username'];
            $adminUserPass  = $_POST['pass'];

            //Query to check if username and password is correct.
            // $adminUserCheck = $conn -> query("SELECT * FROM Admin WHERE username = '$adminUserName'");
            $query = "SELECT * FROM Admin WHERE username = '$adminUserName'";
            $adminUserCheck = DatabaseHandler::fetchData($query,DatabaseHandler::dbconnect());
            //Query for data check.
            if ($adminCheckQuery = $adminUserCheck) {
                //Tranlates fetched data from table into an associative array.
                $adminCheckData   = mysqli_fetch_assoc($adminCheckQuery);
                //compares "password" key from "Admin" array with user inputed password.
                if (password_verify($adminUserPass, $adminCheckData['password'])) {
                    //If password is correct, do the following.
                    console("Password match! Re-direct in 2");
                    echo('<div class="card border-0 shadow rounded-3 br1em mt-5 text-center bg-success text-white w-50 mx-auto align-middle">
                            <p class="p-2 pt-4">
                                Login successful
                            </p>
                        </div>'
                    );
                           
                    $_SESSION["inloggad"] = true;
                    header("Refresh:2; url=admin.php");
                                
                }
                else {
                    console("password does not match!");
                    echo('<div class="card border-0 shadow rounded-3 br1em mt-5 text-center bg-danger text-white w-50 mx-auto align-middle">
                            <p class="p-2 pt-4">
                                Login failed
                            </p>
                        </div>'
                    );
                }
            }
            else {
                console("Error due to :" . $conn -> error);
            }
                       
        } 
        catch (\Throwable $th) {
            console($th->getMessage());
            console($th->getCode());
            console($th->getLine());
        }
    }
include './Backend/server.php';
include './Backend/Calculation.php';
?>