<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel = "stylesheet" href = "./Styles/rapport.css">
  
    <title>Försäljningsrapport</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto" id="nav-items">
                <li class="nav-item"><a class="nav-link" href="//ÄNDRA TILL RÄTT ID">Admin</a></li>
                <li class="nav-item"><a class="nav-link" href="//ÄNDRA TILL RÄTT ID">Produkt</a></li>
                <li class="nav-item"><a class="nav-link" href="//ÄNDRA TILL RÄTT ID">Rapport</a></li>
                <li class="nav-item"><a class="nav-link" href="//ÄNDRA TILL RÄTT ID">Kassa</a></li>
            </ul>
        </div>
    </nav>
<div id="headerrep">
<h1 class = "header_report">Försäljningsrapport</h1>

</div>

<?php
// Hämta det aktuella året och månaden
$currentYear = date('Y');
$currentMonth = date('m');

$monthName = date('F', strtotime("$currentYear-$currentMonth-01"));

// Skapa en lista med år att visa i rullgardinsmenyn
$yearList = range(date('Y') - 5, date('Y') + 5);

$tableType = isset($_GET['table_type']) ? $_GET['table_type'] : 'month'; // För att hålla reda på vilken typ av tabell som visas.

// Om användaren väljer dagstabell
if ($tableType == 'day') {
    // Hämta den aktiva dagen från URL-parametern
    $activeDay = isset($_GET['day']) ? $_GET['day'] : date('d');

    // Hämta dagens namn baserat på den aktiva dagen
    $dayName = date('l', strtotime("$currentYear-$currentMonth-$activeDay"));

    // Här visar den en tabell för försäljningsrapporten inom den aktiva dagen
    echo '
    <table border="1">
        <tr>
            <th colspan="3">
                <h3 class="header_report">' . $dayName . ' - ' . $activeDay .'</h3>
            </th>
            <th><div class="dropdown">
        <button class="dropbtn">Betalnings alternativ</button>
        <div class="dropdown-content">
            <a href="?table_type=">Kontanter</a>
            <a href="?table_type=">Swish</a>
        </div>
    </div></th>
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
        </tr>
    </table>
    ';
}

// Om användaren väljer månadsstabell
if ($tableType == 'month') {

// Här visar den en tabell för försäljningsrapporten inom den aktiva månaden
echo '
<table border="1">

<tr >
<th colspan="3"><h3 class = header_report> '. $monthName . ' - ' . $currentYear .'</h3></th>
<th><div class="dropdown">
        <button class="dropbtn">Betalnings alternativ</button>
        <div class="dropdown-content">
            <a href="?table_type=">Kontanter</a>
            <a href="?table_type=">Swish</a>
        </div>
    </div></th>

</tr>

    <tr>
        <th>Produkt</th>
        <th>Totalt</th>
        <th>Antal</th>
        <th><div class="dropdown">
        <button class="dropbtn">' . ucfirst($tableType) . '</button>
        <div class="dropdown-content">
            <a href="?table_type=month">Månadstabell</a>
            <a href="?table_type=day">Dagstabell</a>
        </div>
    </div></th>
    </tr>
</table>
';
}

?>



    
</body>
</html>