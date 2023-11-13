<?php 
    include "../Backend/databseHandler.php";
    include "../Backend/console.php";
    try {
        function getsummary($month,$paymentMethod,$getMonthlySum){
            $sqlGetReport = "SELECT SUM(Total_Sum) FROM Payment WHERE monthname($month) = MONTHNAME(CURRENT_DATE) ";
            if($getMonthlySum ==false){
                $sqlGetReport = $sqlGetReport." AND payment_method = '$paymentMethod'";
            }
        $sqlGetReport = DatabaseHandler::fetchData($sqlGetReport,DatabaseHandler::dbconnect());
        return (mysqli_fetch_assoc($sqlGetReport)['SUM(Total_Sum)']); 
        }
    $totalSuma = getsummary("payment_date","",true);
    $amountCash = getsummary('payment_date','Kontant',false);
    $amountSwisha = getsummary('payment_date','Swish',false);
    
    echo    "<div class='mb-4'>
                <h4>Idag</h4>
            </div>";
    echo "<div class='mb-4'>
            <h1>Summa: ".$totalSuma." kr </h1>";
    echo    "<p>Swish: ".$amountSwisha." kr</p>";
    echo    "<p>Kontanter: ".$amountCash." kr</p>
        </div>";
    }
    catch (\Throwable $th) {
        console($th->getMessage());
        console($th->getLine());
    }                     
?>

<!-- 
	 <div class='mb-4'>
			<h4>Idag</h4>
		</div>
        <div class='mb-4'>
            <h3>Summa: 45 kr</h3>
            <p>Swish: 12 kr</p>
            <p>Kontanter: 34 kr</p>
        </div> -->