<?php
//Variablerna som kommer ta in nummervärden för att användas i kassan
#include '../Backend/console.php';
function calculate(){
    $cash = 0;
    $sum = 0;
    $rest = 0;

    $totalSum = 0;
    //Checkar att submit knappen utfört sin post
    if(isset($_POST['submit'])){
        for ($x=0; $x < $_SESSION["index"]; $x++) {
            $totalSum += (int)$_POST["count".$x] * (int)$_SESSION["prices"][$x];
        }
        echo $totalSum;
        $_SESSION["sum"] = $totalSum;
        
        header("location:../Frontend/checkout.php");
    }
}
calculate();
?>
