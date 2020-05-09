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

          </tbody>
        </table>
        <p class="d-none" id="emptyCart">Your cart is empty</p>
      </div>

      <div class="row justify-content-center mt-3">
        <div class="col-4 bg-dark text-white">
          <p class="col d-inline">TOTAL:</p>
          <p class="col d-inline" id="totalCost">$0.00</p>
        </div>
      </div>

      <div class="row justify-content-center mt-3">
        <div class="col-8 bg-dark text-white">
          <h5>Address:</h5>
          <p id="address"></p>
          <h5>City:</h5>
          <p id="city"></p>
          <h5>Country:</h5>
          <p id="country"></p>
          <h5>Zip Code:</h>
          <p id="zip"></p>
        </div>
      </div>

      <div class="row justify-content-center mt-3">
        <a href="https://radiant-springs-66140.herokuapp.com/03_Prove/orderplaced.html" class="btn btn-outline-success btn-lg">Place Order</a>
        <a href="checkout.php" class="btn btn-outline-success btn-lg ml-1">Back</a>
      </div>
    </div>
  </body>
</html>