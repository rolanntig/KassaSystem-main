<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel = "stylesheet" href = "./css/style.css">
  
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

<h1 class = "header_report">Försäljningsrapport</h1>

<!-- <table>

<tr>
    <th colspan = "3"><h2>Månad</h2>
    <label for="tableType">Välj tabelltyp:</label>
    <select id="tableType" name="table_type">
        <option value="month" >Månadstabell</option>
        <option value="day">Dagstabell</option>
    </select>
</th>
</tr>

  <tr>
    <th>Produkt</th>
    <th>Totalt</th>
    <th>Antal</th>
  </tr>
  
</table> -->



<?php
// Hämta det aktuella året och månaden
$currentYear = date('Y');
$currentMonth = date('m');

$monthName = date('F', strtotime("$currentYear-$currentMonth-01"));

// Skapa en lista med år att visa i rullgardinsmenyn
$yearList = range(date('Y') - 5, date('Y') + 5);

$tableType = isset($_GET['table_type']) ? $_GET['table_type'] : 'month'; // För att hålla reda på vilken typ av tabell som visas.

$table = '
<table border="1">
<tr>
<th colspan="4">
    <h2>' . $monthName . '</h2>
    <label for="tableType"></label>
    <select id="tableType" name="table_type" onchange="changeTableType(this.value)">
    <option value="month" selected> Välj tabelltyp</option>
        <option value="month" ' . ($tableType == 'month' ?  : '') . '>Månadstabell</option>
        <option value="day" ' . ($tableType == 'day' ? : '') . '>Dagstabell</option>
    </select>
</th>
</tr>
<tr>
    <th>Produkt</th>
    <th>Totalt</th>
    <th>Antal</th>
</tr>
';

if ($tableType == 'day') {
    // Visa dagstabell
    // Du kan anpassa koden för dagstabellen här
    
} else {
    // Visa månadstabell
    // Du kan anpassa koden för månadstabellen här
}

$table .= '</table>';
?>

<?php
echo $table;
?>

    
</body>
</html>