<?php
  session_start();
?>

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
        <form action="confirm.php" method="GET" class="col-8 form">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address">
          <label for="city">City</label>
          <input type="text" class="form-control" name="city">
          <label for="country">Country</label>
          <input type="text" class="form-control" name="country">
          <label for="zip">Zip Code</label>
          <input type="text" class="form-control col-sm-4 col-md-3 
          col-lg-2" name="zip">
        </form>
      </div>

      <div class="row justify-content-center">
        <a href="confirm.php" class="btn btn-outline-success btn-lg">Confirm</a>
        <a href="viewCart.php" class="btn btn-outline-success btn-lg ml-1">Back</a>
      </div>
    </div>
  </body>
</html>