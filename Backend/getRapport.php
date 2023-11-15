<?php
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
            //echo "Name: " . $row["product_name"] . " , Amount: " . $row["amount_sold"] . "<br>";
        }
        $conn->close();
        return $array;
    } else {
        return false;
    }
    $conn->close();
}

function getDailyRapport($payMethod = "both")
{
    $total = 0;
    $totalAmount = 0;
    $string = "";
    $day = date("d");
    $month = date("m");
    $year = date("Y");

    // Checks for payment method and selects all in database if there is a method chosen
    if ($payMethod != "both") {
        $array = connectToDb("SELECT * FROM Payment WHERE payment_method = '$payMethod' AND DAY(payment_date) = '$day' AND MONTH(payment_date) = '$month' AND YEAR(payment_date) = '$year'");
    } else {
        $array = connectToDb("SELECT * FROM Payment WHERE DAY(payment_date) = '$day' AND MONTH(payment_date) = '$month' AND YEAR(payment_date) = '$year'");
    }
    if ($array != false) {
        foreach ($array as $row) {
            $string .= "<tr>";
            $amountSold = $row['amount_sold'];
            $prodName = $row['product_name'];
            $data = connectToDb("SELECT * FROM Products WHERE product_name = '$prodName'");
            foreach ($data as $product) {
                $totalPerProduct = ($product['price'] * $amountSold);
                $total += $totalPerProduct;
                $totalAmount += $amountSold;

                // Code for admin page, might be applicable here so saving it for now
                // switch ($row['payment_method']) {
                //     case "Swish":
                //         $swishTotal += ($product['price'] * $amountSold);
                //         break;
                //     case "Kontant":
                //         $kontantTotal += ($product['price'] * $amountSold);
                //         break;
                // }

                // Adds a large string with data for printing later. (date neds fixing) 
                $string .= "<td>" . $product['product_name'] . "</td><td>" . $totalPerProduct . " kr</td><td>" . $row['amount_sold'] . " st</td><td>" . $row['payment_date'] . "</td></tr>";
            }
        }
    }
    return "$string<tr><td>Allting</td><td>$total kr</td><td>$totalAmount st</td><td></td>";
}

function getMonthlyRapport($payMethod = "both")
{
    $total = 0;
    $totalAmount = 0;
    $string = "";
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
            $data = connectToDb("SELECT * FROM Products WHERE product_name = '$prodName'");
            foreach ($data as $product) {
                $totalPerProduct = ($product['price'] * $amountSold);
                $total += $totalPerProduct;
                $totalAmount += $amountSold;

                // Code for admin page, might be applicable here so saving it for now
                // switch ($row['payment_method']) {
                //     case "Swish":
                //         $swishTotal += ($product['price'] * $amountSold);
                //         break;
                //     case "Kontant":
                //         $kontantTotal += ($product['price'] * $amountSold);
                //         break;
                // }

                // Adds a large string with data for printing later. (date neds fixing) 
                $string .= "<td>" . $product['product_name'] . "</td><td>" . $totalPerProduct . " kr</td><td>" . $row['amount_sold'] . " st</td><td>" . $row['payment_date'] . "</td></tr>";
            }
        }
    }
    return "$string<tr><td>Allting</td><td>$total kr</td><td>$totalAmount st</td><td></td>";
}
