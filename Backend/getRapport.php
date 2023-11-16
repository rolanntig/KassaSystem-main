<?php

// Function for connecting to database and returning the data as a nested array, if nothing in databas
// the function returns false. Takes a variable in the form of a sql request string.
function connectToDb($sql)
{
    // Connects to the database for fetching data
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
    } else {
        return false;
    }
    $conn->close();
}

// Function for fetching all of the sales of the day with an optionall variable $payMethod for checking
// if the payment_method is kontanter or swish and if nothing entered, both.
// Returns a string constructed to be inside a tbody tag
function getDailyRapport($payMethod = "both")
{
    $total = 0;
    $totalAmount = 0;
    $string = "";
    $date = date("Y-m-d H:i:s");
    $day = date("d");
    $month = date("m");
    $year = date("Y");

    // Checks for payment method and selects all in database if there is a method chosen
    if ($payMethod != "both") {
        $array = connectToDb("SELECT * FROM Payment WHERE payment_method = '$payMethod' AND DAY(payment_date) = '$day' AND MONTH(payment_date) = '$month' AND YEAR(payment_date) = '$year'");
    } else {
        $array = connectToDb("SELECT * FROM Payment WHERE DAY(payment_date) = '$day' AND MONTH(payment_date) = '$month' AND YEAR(payment_date) = '$year'");
    }
    if ($array != false) { // Checks if any data was returned if not add a row with no products and such
        foreach ($array as $row) {
            $string .= "<tr>";
            $amountSold = $row['amount_sold'];
            $prodName = $row['product_name'];

            // Connects to the database and selects eveything from products to fetch the price of said product
            // Might be better to input a price into the payment table...
            $data = connectToDb("SELECT * FROM Products WHERE product_name = '$prodName'");
            foreach ($data as $product) {

                $totalPerProduct = ($product['price'] * $amountSold);
                $total += $totalPerProduct;
                $totalAmount += $amountSold;

                // Adds to the large string with the fetched data as a table row 
                $string .= "<td>" . $product['product_name'] . "</td><td>" . $totalPerProduct . " kr</td><td>" . $row['amount_sold'] . " st</td><td>" . $row['payment_date'] . "</td></tr>";
            }
        }
        return "$string<tr><td>Allting</td><td>$total kr</td><td>$totalAmount st</td><td>$date</td>";
    } else { // Said row with no products and more text
        $string .= "<tr><td>Inga Försäljningar</td><td>0 kr</td><td>0 st</td><td>$date</td></tr>";
        return $string;
    }
}

// Function for fetching all of the sales of the current month with an optionall variable $payMethod 
// for checking if the payment_method is kontanter or swish and if nothing entered, both.
// Returns a string constructed to be inside a tbody tag
function getMonthlyRapport($payMethod = "both")
{
    $total = 0;
    $totalAmount = 0;
    $string = "";
    $date = date("Y-m-d H:i:s");
    $month = date("m");
    $year = date("Y");

    // Checks for payment method and selects all in database if there is a method chosen
    if ($payMethod != "both") {
        $array = connectToDb("SELECT * FROM Payment WHERE payment_method = '$payMethod' AND MONTH(payment_date) = '$month' AND YEAR(payment_date) = '$year'");
    } else {
        $array = connectToDb("SELECT * FROM Payment WHERE MONTH(payment_date) = '$month' AND YEAR(payment_date) = '$year'");
    }

    if ($array != false) {
        foreach ($array as $row) {
            $string .= "<tr>";
            $amountSold = $row['amount_sold'];
            $prodName = $row['product_name'];
            
            // Connects to the database and selects eveything from products to fetch the price of said product
            // Might be better to input a price into the payment table...
            $data = connectToDb("SELECT * FROM Products WHERE product_name = '$prodName'");
            foreach ($data as $product) {
                $totalPerProduct = ($product['price'] * $amountSold);
                $total += $totalPerProduct;
                $totalAmount += $amountSold;

                // Adds a large string with data for printing later. (date neds fixing) 
                $string .= "<td>" . $product['product_name'] . "</td><td>" . $totalPerProduct . " kr</td><td>" . $row['amount_sold'] . " st</td><td>" . $row['payment_date'] . "</td></tr>";
            }
        }
        return "$string<tr><td>Allting</td><td>$total kr</td><td>$totalAmount st</td><td>$date</td>";
    } else {
        $string .= "<tr><td>Inga Försäljningar</td><td>0 kr</td><td>0 st</td><td>$date</td></tr>";
        return $string;
    }
}
