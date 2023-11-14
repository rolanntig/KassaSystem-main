<?php 
include "../Backend/credentials.php";
?>       
<h1 class="mb-4 mt-3 text-center">Produkter</h1>
<table id="produkterKvar" class="table">
    <thead>
        <tr>
            <th scope="col">Produkt</th>
            <th scope="col">Typ</th>
            <th scope="col">Antal</th>
            <th scope="col">Pris</th>
            <th scope="col">Bäst före</th>
            <th scope="col">Barcode</th>
        </tr>
    </thead>
    <?php
        try {
            $sqlGetProduct = 'SELECT * FROM Products';
            $products= mysqli_query($conn, $sqlGetProduct);
            //fetches all products from database
            while($row = mysqli_fetch_assoc($products)){
                echo '<tr>';
                echo '<td>'.$row['product_name'].'</td>';
                echo '<td>'.$row['category'].'</td>';
                echo '<td>'.$row['amount'].'</td>';
                echo '<td>'.$row['price'].' kr </td>';
                echo '<td>'.$row['expire_date'].'</td>';
                echo '<td>'.$row['barcode'].'</td>';
                echo '<td>' 
                .'<form action="" method="POST">'
                .'<button type="submit" class="btn btn-danger" value="'.$row['ID'] .'" name="del" id="del-btn"> 
                    Delete'
                .'</button>'
                .'</form>'
                .'</td>';
                echo '</tr>';
                }
                $id = $_POST['del'];
                echo $id;
            if ( isset($_POST['del'])){
                include 'delete.php';
            }
                        
            mysqli_close($conn);
            } catch (\Throwable $th) {
                console($th->getMessage());
                console($th->getLine());
            }
    ?>
</table>