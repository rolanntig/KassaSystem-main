<?php
    //Include credentials for the entire database. This file is ignored to keep it secret.
    include "../Backend/credentials.php";
    include "../Backend/console.php";
   
    // // Function to register a new admin to AdminTable
    // function RegisterAdmin($username, $password) {
    //     $sqliRegisterAdminQuery = "INSERT INTO `Admin`(`username`, `password`) VALUES ('$username', '$password')";
    //     return $sqliRegisterAdminQuery;
    // }
    
   

    class DatabaseHandler {
        
        //create a secure database connection
        public static function dbconnect(){
            try{
                $connection=mysqli_connect($server, $username, $password, $dbname, $port);
                if(!$connection){
                    console("Connection failed: " . mysqli_connect_error()); die;
                }
                return $connection;
            }catch(Exception $e){
                echo "Error: " . $e->getMessage();
            }
        }
        //fetch data securely and prevent sql injection
        public static function fetchData($sqlquery,$connection){
            try {
                $stmt = $connection->prepare($sqlquery);
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close();
                console("Fetching data success!");
                return $result;
            } catch (\Throwable $th) {
                console($th->getMessage());
                console($th->getLine());
            }
        }

        public static function getAvailableProducts(){
            $connection = DatabaseHandler::dbconnect();
            $sqlGetProduct  = 'SELECT * FROM Products';
            $products       = DatabaseHandler::fetchData($sqlGetProduct, $connection);
            $connection->close();
            return $products;
        }

    }
?>