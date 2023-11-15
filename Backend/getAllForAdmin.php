<?php

// Function for getting all usernames and last logins from the database for use in the admin page
// Works by sending an array which was gotten through the database
function getCashiers($persons)
{
    $string = "";
    foreach ($persons as $person) { // For each registered cashier adds their username and last login to an string
        $username = $person['username'];
        $lastLogin = $person['last_login'];
        $id = $person['ID'];
        $string .= "
        <tr>
            <td>$username</td>
            <td id='cell'>$lastLogin</td>
            <td>
                <form method='get'>
                    <button type='submit' class='btn btn-danger' id='deleteBtn_nr$id' value='$id' name='deleteBtn'>Delete</button>
                </form>
            </td>
        </tr>";
        // <button type='' class='btn btn-success' id='showBtn' name='showBtn'>Show</button>
        // <button type='' class='btn btn-primary' id='editBtn' name='editBtn'>Edit</button>
    }
    // prints the string 
    echo $string;
}
function removeCashiers($who)
{
    $sql = ("DELETE FROM Admin WHERE ID='$who'");
    $server = "mysql.jawad.se";
    $username = "kassa";
    $password = "cGZZ2.I2mYPE*T@p";
    $dbname = "kassa";
    $port = 80;

    $conn = new mysqli($server, $username, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query($sql);
    $conn->close();
}

// Function for connecting to the database with a variable for sending request to the database
function connectToDb($sql)
{
    // Declares the variables needed for connecting to the database, 
    // otherwise included in the credentials.php file (MIGHT connect there instead later)
    $server = "mysql.jawad.se";
    $username = "kassa";
    $password = "cGZZ2.I2mYPE*T@p";
    $dbname = "kassa";
    $port = 80;

    $conn = new mysqli($server, $username, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $array = [];
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
        $conn->close();
        return $array;
    }
    $conn->close();
}

// Function for fetching all of the products sold during current day
function getDailyRapport()
{
    $total = 0;
    $swishTotal = 0;
    $kontantTotal = 0;
    $day = date("d");
    $month = date("m");
    $year = date("Y");

    // Sends a database request to fetch all of the products sold during current day
    // Works by checking if day, month and year matches
    $array = connectToDb("SELECT product_name, amount_sold, payment_method FROM Payment 
                        WHERE DAY(payment_date) = '$day' AND MONTH(payment_date) = '$month' 
                        AND YEAR(payment_date) = '$year'");

    if ($array != NULL) {
        foreach ($array as $row) {
            $amountSold = $row['amount_sold'];
            $prodName = $row['product_name'];

            // Sends a request to the database to fetch the price of said sold item for calculations
            $data = connectToDb("SELECT product_name, price FROM Products 
                                WHERE product_name = '$prodName'");
            if ($data != null) {
                foreach ($data as $product) {
                    $total += ($product['price'] * $amountSold);
                    switch ($row['payment_method']) {
                        case "Swish":
                            $swishTotal += ($product['price'] * $amountSold);
                            break;
                        case "Kontant":
                            $kontantTotal += ($product['price'] * $amountSold);
                            break;
                    }
                }
            }
        }
    }
    // Prints the totals for each payment method and total as a two div(s)
    echo "<div class='mb-4'><h2>Denna dag</h2></div>"
        . "<div class='mb-4'><h1>Summa: " . $total . " kr</h1>"
        . "<p>Swish: " . $swishTotal . " kr</p>"
        . "<p>Kontanter: " . $kontantTotal . " kr</p></div>";
}


// Function for fetching all of the products sold during current month
function getMonthlyRapport()
{
    $total = 0;
    $swishTotal = 0;
    $kontantTotal = 0;
    $month = date("m");
    $year = date("Y");

    // Sends a database request to fetch all of the products sold during current month
    // works by checking so that month and year matches
    $array = connectToDb("SELECT product_name, amount_sold, payment_method FROM Payment 
                        WHERE MONTH(payment_date) = '$month' AND YEAR(payment_date) = '$year'");
    if ($array != NULL) {
        foreach ($array as $row) { // Goes through each product sold and adds it to a total
            $amountSold = $row['amount_sold'];
            $prodName = $row['product_name'];

            // Sends a request to the database to fetch the price of said sold item for calculations
            $data = connectToDb("SELECT product_name, price FROM Products 
                                WHERE product_name = '$prodName'");
            if ($data != null) {
                foreach ($data as $product) {
                    $total += ($product['price'] * $amountSold);
                    switch ($row['payment_method']) {
                        case "Swish":
                            $swishTotal += ($product['price'] * $amountSold);
                            break;
                        case "Kontant":
                            $kontantTotal += ($product['price'] * $amountSold);
                            break;
                    }
                }
            }
        }
    }
    // Prints the totals for each payment method and total as a two div(s)
    echo "<div class='mb-4'><h2>Denna månad</h2></div>"
        . "<div class='mb-4'><h1>Summa: " . $total . " kr</h1>"
        . "<p>Swish: " . $swishTotal . " kr</p>"
        . "<p>Kontanter: " . $kontantTotal . " kr</p></div>";
}


// Function for fetching all of the products in the product table inside the database
function getAllProductsAdmin($conn)
{
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
}
