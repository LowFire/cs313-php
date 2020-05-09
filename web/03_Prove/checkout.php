<!DOCTYPE html>
<html>
  <head>
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <h1 class="jumbotron text-center bg-dark text-white col-8">Checkout</h1>
      </div>

      <div class="row justify-content-center">
        <form action="" method="POST" class="col-8">
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city">
            <label for="country">Country</label>
            <input type="text" class="form-control" id="contry" name="contry">
            <label for="zip">Zip Code</label>
            <input type="text" class="form-control col-sm-4 col-md-3 
            col-lg-2" id="zip" name="zip">
          </div>
        </form>
      </div>

      <?php
        echo "quantity_plaindog: " . $_POST['quantity_plaindog'];
        echo "quantity_spicydog: " . $_POST['quantity_spicydog'];
        echo "quantity_chilidog: " . $_POST['quantity_chilidog'];
        echo "quantity_deluxdog: " . $_POST['quantity_deluxdog'];
      ?>

      <div class="row justify-content-center">
        <a href="https://radiant-springs-66140.herokuapp.com/03_Prove/confirm.html" class="btn btn-outline-success btn-lg">Confirm</a>
        <a href="https://radiant-springs-66140.herokuapp.com/03_Prove/viewCart.html" class="btn btn-outline-success btn-lg ml-1">Back</a>
      </div>
    </div>
  </body>
</html>