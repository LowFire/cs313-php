<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Confirm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <h1 class="jumbotron text-center bg-dark text-white col-8">Confirm Order</h1>
      </div>

      <div class="row justify-content-center">
        <table class="table table-dark">
          <thead>
            <th></th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Cost</th>
          </thead>

          <tbody id="cartContents">
            <?php
                if ($_SESSION['quantity_plaindog'] > 0) {
                  printf("<tr><td><img src=\"hotdog.png\"></td>");
                  printf("<td>Plain Hotdog</td>");
                  printf("<td>%2d</td>", $_SESSION['quantity_plaindog']);
                  printf("<td>$%5.2f</td></tr>", $_SESSION['plainDogCost'] * $_SESSION['quantity_plaindog']);
                }
                if ($_SESSION['quantity_spicydog'] > 0) {
                  printf("<tr><td><img src=\"spicy_hotdog.png\"></td>");
                  printf("<td>Spicy Hotdog</td>");
                  printf("<td>%2d</td>", $_SESSION['quantity_spicydog']);
                  printf("<td>$%5.2f</td></tr>", $_SESSION['spicyDogCost'] * $_SESSION['quantity_spicydog']);
                }
                if ($_SESSION['quantity_chilidog'] > 0) {
                  printf("<tr><td><img src=\"chilidog.png\"></td>");
                  printf("<td>ChiliDog</td>");
                  printf("<td>%2d</td>", $_SESSION['quantity_chilidog']);
                  printf("<td>$%5.2f</td></tr>", $_SESSION['chiliDogCost'] * $_SESSION['quantity_chilidog']);
                }
                if ($_SESSION['quantity_deluxdog'] > 0) {
                  printf("<tr><td><img src=\"udeluxdog.png\"></td>");
                  printf("<td>Ultimate Deluxe Dog</td>");
                  printf("<td>%2d</td>", $_SESSION['quantity_deluxdog']);
                  printf("<td>$%5.2f</td></tr>", $_SESSION['deluxDogCost'] * $_SESSION['quantity_deluxdog']);
                }
              ?>
          </tbody>
        </table>
        <p><?php 
          if ($_SESSION['quantity_plaindog'] == 0 && $_SESSION['quantity_spicydog'] == 0 && $_SESSION['quantity_chilidog'] == 0
          && $_SESSION['quantity_deluxdog'] == 0)
              printf("Your cart is empty");
        ?></p>
      </div>

      <div class="row justify-content-center mt-3">
        <div class="col-4 bg-dark text-white">
          <p class="col d-inline">TOTAL:</p>
          <p class="col d-inline" id="totalCost"><?php 
          $totalCost = 0;
          $totalCost += $_SESSION['quantity_plaindog'] * $_SESSION['plainDogCost'];
          $totalCost += $_SESSION['quantity_spicydog'] * $_SESSION['spicyDogCost'];
          $totalCost += $_SESSION['quantity_chilidog'] * $_SESSION['chiliDogCost'];
          $totalCost += $_SESSION['quantity_deluxdog'] * $_SESSION['deluxDogCost'];
          printf("$%5.2f", $totalCost);
          ?></p>
        </div>
      </div>

      <div class="row justify-content-center mt-3">
        <div class="col-8 bg-dark text-white">
          <h5>Address:</h5>
          <p id="address"><?php echo "test";?></p>
          <h5>City:</h5>
          <p id="city"><?php echo $_POST['city'];?></p>
          <h5>Country:</h5>
          <p id="country"><?php echo $_POST['country'];?></p>
          <h5>Zip Code:</h5>
          <p id="zip"><?php echo $_POST['zip'];?></p>
        </div>
      </div>

      <div class="row justify-content-center mt-3">
        <a href="https://radiant-springs-66140.herokuapp.com/03_Prove/orderplaced.html" class="btn btn-outline-success btn-lg">Place Order</a>
        <a href="checkout.php" class="btn btn-outline-success btn-lg ml-1">Back</a>
      </div>
    </div>
  </body>
</html>