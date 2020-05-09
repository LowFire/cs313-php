<?php
  session_start();

  $_SESSION['quantity_plaindog'] = $_POST['quantity_plaindog'];
  $_SESSION['quantity_spicydog'] = $_POST['quantity_spicydog'];
  $_SESSION['quantity_chilidog'] = $_POST['quantity_chilidog'];
  $_SESSION['quantity_deluxdog'] = $_POST['quantity_deluxdog'];
  $_SESSION['plainDogCost'] = 3;
  $_SESSION['spicyDogCost'] = 3.5;
  $_SESSION['chiliDogCost'] = 5;
  $_SESSION['deluxDogCost'] = 6.5;
?>


<!DOCTYPE html>
<html>
  <head>
    <title>View Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  </head>
  
  <body>
    <div class="container">

      <div class="row justify-content-center">
        <h1 class="jumbotron bg-dark text-white col-8 text-center">Your Cart</h1>
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
              if ($_SESSION['quantity_plaindog'] > 0)
                echo "<tr><td><img src=\"hotdog.png\"></td><td>Plain Hotdog</td><td>" . $_SESSION['quantity_plaindog']
                  . "</td><td>" . $_SESSION['quantity_plaindog'] * $_SESSION['plainDogCost'] . "</td></tr>";
              if ($_SESSION['quantity_spicydog'] > 0)
              echo "<tr><td><img src=\"spicy_hotdog.png\"></td><td>Spicy Hotdog</td><td>" . $_SESSION['quantity_spicydog']
              . "</td><td>" . $_SESSION['quantity_spicydog'] * $_SESSION['spicyDogCost'] . "</td></tr>";
              if ($_SESSION['quantity_chilidog'] > 0)
              echo "<tr><td><img src=\"chilidog.png\"></td><td>ChiliDog</td><td>" . $_SESSION['quantity_chilidog']
              . "</td><td>" . $_SESSION['quantity_chilidog'] * $_SESSION['chiliDogCost'] . "</td></tr>";
              if ($_SESSION['quantity_deluxdog'] > 0)
              echo "<tr><td><img src=\"udeluxdog.png\"></td><td>Ultimate Deluxe Dog</td><td>" . $_SESSION['quantity_deluxdog']
              . "</td><td>" . $_SESSION['quantity_deluxdog'] * $_SESSION['deluxDogCost'] . "</td></tr>";
            ?>
          </tbody>
        </table>
        <p class="d-none" id="emptyCart">Your cart is empty</p>
      </div>

      <div class="row mt-3">
        <div class="col-4 bg-dark">
          <p class="col text-white totalCost d-inline">TOTAL:</p>
          <p class="col text-white d-inline" id="totalCost"><?php 
          $totalCost = 0;
          $totalCost += $_SESSION['quantity_plaindog'] * $_SESSION['plainDogCost'];
          $totalCost += $_SESSION['quantity_spicydog'] * $_SESSION['spicyDogCost'];
          $totalCost += $_SESSION['quantity_chilidog'] * $_SESSION['chiliDogCost'];
          $totalCost += $_SESSION['quantity_deluxdog'] * $_SESSION['deluxDogCost'];
          printf("$%5.2f", $totalCost);
          ?></p>
        </div>
      </div>

      <div class="row mt-3">
        <a href="checkout.php" class="btn btn-outline-success btn-lg">Checkout</a>
        <a href="03_prove.php" class="btn btn-outline-success btn-lg ml-1">Back</a>
      </div>

    </div>
  </body>
</html>