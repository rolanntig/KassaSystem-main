  <!-- THIS FILE IS INCLUDED IN 'kassa.php' FOR FINDING AVIAILABLE PRODUCTS-->
  <?php
    include "../Backend/credentials.php";
    include "../Backend/console.php";
    include "../Backend/databaseHandler.php";
    try {
        
        $dbHandler = new DatabaseHandler;
        $conn = $dbHandler->dbconnect();
        $dbHandler->getAvailableProducts($conn);
        $sqlGetProduct  = 'SELECT * FROM Products';
        $products       = mysqli_query($conn, $sqlGetProduct);
        $_SESSION["prices"] = array();
        echo "<form action='#' method='POST'>";
        $i = 0;
        while ($row = mysqli_fetch_assoc($products)){
          
          echo "<td data-th='Product'>
              <div class='row grid-container'>
                  <div class='item1 col-md-9 text-left mt-sm-2'>
                      <h4>". $row['product_name'] ."</h4>
                      <p class='font-weight-light'>". $row['category'] ."</p>
                  </div>
              </div>
          </td>
          <td data-th='Price'>" . $row['price'] . " kr</td>
          <td data-th='Quantity'>
              <input type='number' name='count". $i ."' class='amountinput item2 form-control form-control-lg text-center' value='1'>
          </td>
          <!--<td class='actions' data-th=''>
              <div class='text-right'>
                  <button class='btn btn-white border-secondary bg-white btn-md mb-2'>
                      <i class='fas fa-sync'></i>
                  </button>
                  <button class='btn btn-primary mb-4 btn-lg pl-5 pr-5' id='submit-button' name='submit'>
                  
                      <i class='fas fa-trash'></i>
                  </button>
              </div>
          </td>-->";
          $i++; 
          array_push($_SESSION["prices"], $row["price"]);
      } 
      echo "<input type='submit' name='submit'>";
      echo "</form>";
       $_SESSION["index"] = $i;

      
      mysqli_close($conn);
    } catch (\Throwable $th) {
      console($th->getMessage());
    }

    
?>