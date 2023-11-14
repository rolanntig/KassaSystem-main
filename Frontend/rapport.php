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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./Styles/navbar.css">
    <link rel="stylesheet" type="text/css" href="./Styles/kassa.css">
    <link rel="stylesheet" type="text/css" href="./Styles/rapport.css">
    <title>Rapport</title>
</head>

<body>

<div id="headerrep">
<h1 class = "header_report">Försäljningsrapport</h1>

</div>

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