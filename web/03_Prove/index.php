<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>HotDogs</title>
    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2519c97874.js" crossorigin="anonymous"></script>
  </head>
  
  <body>

    <div class="container">

      <div class="row justify-content-center text-center">
        <h2 class="col-sm-8">Hot Dog Order Form</h2>
      </div>
      
      <div class="row justify-content-center">
        <form action="" method="POST" class="col-8">
          
          <table class="table table-hover">
            <thead class="table-info">
              <th></th>
              <th>Item</th>
              <th>Cost</th>
              <th>Quantity</th>
            </thead>
            
            <tbody>
              <tr>
                <td><img src="hotdog.png"></td>
                <td>Plain Hotdog</td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>Spicy Hotdog</td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>ChiliDog</td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>Ultimate Deluxe Dog</td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
          
          <a href="#" class="btn btn-success">Cart 
            <i class="fas fa-shopping-cart"></i></a>

        </form>
      </div>
    </div>

  </body>
</html>