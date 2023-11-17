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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Styles/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./Styles/rapport.css">
    <title>Rapport</title>
</head>

<body>

    <?php
    // Adds the header.php file so the site gets a header
    include 'header.php';

    // Adds the getRapport.php file with all the functions for fetching the data for the table
    include '../Backend/getRapport.php';
    ?>
    <div id="headerrep">
        <h1 class="header_report">Försäljningsrapport</h1>
    </div>

    <?php
    // Hämta det aktuella året och månaden
    $currentYear = date('Y');
    $currentMonth = date('m');

    $monthName = date('F', strtotime("$currentYear-$currentMonth-01"));

    // Skapa en lista med år att visa i rullgardinsmenyn
    $yearList = range(date('Y') - 5, date('Y') + 5);

    // För att hålla reda på vilken typ av tabell som visas. Den visar vilken tabell som ska visas först.
    $tableType = isset($_GET['table_type']) ? $_GET['table_type'] : 'month';

    // Create a string, which is a table 
    $tableString =
        '<table id="fulltable" border="1" class="fullProductTable">
        <tr>
            <th colspan="3">';

    // Creates another string for completing the table
    $tableString2 =
        '<th>
        <div class="dropdown">
            <button class="dropbtn">Betalnings alternativ</button>
            <div class="dropdown-content">
                <a href="?table_type=kontant">Kontanter</a>
                <a href="?table_type=swish">Swish</a>
            </div>
        </div>
        </th>
            </tr>
            <tr>
                <th>Produkt</th>
                <th>Totalt</th>
                <th>Antal</th>
                <th>
                    <div class="dropdown">
                        <button class="dropbtn">' . ucfirst($tableType) . '</button>
                        <div class="dropdown-content">
                            <a href="?table_type=month">Månadstabell</a>
                            <a href="?table_type=day">Dagstabell</a>
                        </div>
                    </div>
                </th>
        </tr>';

    // If the user choses day, display todays earning in a table
    if ($tableType == 'day') {
        // Hämta den aktiva dagen från URL-parametern
        $activeDay = isset($_GET['day']) ? $_GET['day'] : date('d');
        // Hämta dagens namn baserat på den aktiva dagen
        $dayName = date('l', strtotime("$currentYear-$currentMonth-$activeDay"));

        // Här visar den en tabell för försäljningsrapporten inom den aktiva dagen. $dayName och $activeDay visar den aktiva dagen.
        // Dropdowns knapparna ligger i en tabell i th-taggen.
        $tableString .= '<h3 class="header_report">' . $dayName . ' - ' . $activeDay . '</h3></th>';

        // Calls the function getDailyRapport and adds it to the table string for echo(ing)
        $tableString .= $tableString2 . getDailyRapport() . '</table>';
        echo ($tableString);
    }

    // If the user choses month, display table for the months earning
    if ($tableType == 'month') {
        // Här visar den en tabell för försäljningsrapporten inom den aktiva månaden.$monthName och $currentYear visar den aktiva 
        // månaden och året. Dropdowns knapparna ligger i en tabell i th-taggen.
        $tableString .= '<h3 class = header_report> ' . $monthName . ' - ' . $currentYear . '</h3></th>';

        // Calls the function getMonthlyRapport and adds it to the table string for echo(ing)
        $tableString .= $tableString2 . getMonthlyRapport() . '</table>';
        echo ($tableString);
    }

    // If the user choses kontant as the payment method show whole month but only kontant payments
    if ($tableType == "kontant") {
        $tableString .= '<h3 class = header_report> ' . $monthName . ' - ' . $currentYear . '</h3></th>';

        // Calls the function getMonthlyRapport with the variable Kontant such that it only takes 
        // the transactions with kontant and adds it to the table string for echo(ing)
        $tableString .= $tableString2 . getMonthlyRapport("Kontant") . '</table>';
        echo ($tableString);
    }

    // If the user choses swish as the payment method show whole month but only swish payments
    if ($tableType == "swish") {
        $tableString .= '<h3 class = header_report> ' . $monthName . ' - ' . $currentYear . '</h3></th>';

        // Calls the function getMonthlyRapport with the variable swish such that it only takes 
        // the transactions with kontant and adds it to the table string for echo(ing)
        $tableString .= $tableString2 . getMonthlyRapport("Swish") . '</table>';
        echo ($tableString);
    }
    ?>
</body>

</html>