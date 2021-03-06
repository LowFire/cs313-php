

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
        <h2 class="col-sm-8 jumbotron bg-dark text-white">Hot Dog Order Form</h2>
      </div>
      
      <div class="row justify-content-center">
        <div class="col-8">
          <form action="viewCart.php" method="POST" class="form">

            <table class="table table-hover table-dark">
              <thead>
                <th></th>
                <th>Item</th>
                <th>Cost</th>
                <th>Quantity</th>
                <th></th>
              </thead>
              
              <tbody>
                <tr>
                  <td><img src="hotdog.png"></td>
                  <td>Plain Hotdog</td>
                  <td>$3.00</td>
                  <td>
                    <input type="number" class="form-control" name="quantity_plaindog">
                  </td>
                  <td><button class="btn btn-outline-primary btn-sm" id="addPlainDog">
                    <i class="fas fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td><img src="spicy_hotdog.png"></td>
                  <td>Spicy Hotdog</td>
                  <td>$3.50</td>
                  <td>
                    <input type="number" class="form-control" name="quantity_spicydog">
                  </td>
                  <td><button class="btn btn-outline-primary btn-sm" id="addSpicyDog">
                    <i class="fas fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td><img src="chilidog.png"></td>
                  <td>ChiliDog</td>
                  <td>$5.00</td>
                  <td>
                    <input type="number" class="form-control" name="quantity_chilidog">
                  </td>
                  <td><button class="btn btn-outline-primary btn-sm" id="addChiliDog">
                    <i class="fas fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td><img src="udeluxdog.png"></td>
                  <td>Ultimate Deluxe Dog</td>
                  <td>$6.50</td>
                  <td>
                    <input type="number" class="form-control" name="quantity_deluxdog">
                  </td>
                  <td><button class="btn btn-outline-primary btn-sm" id="addDeluxDog">
                    <i class="fas fa-plus"></i></button></td>
                </tr>
              </tbody>
            </table>
            
            <button type="submit" class="btn btn-outline-success btn-lg">
              Cart <i class="fas fa-shopping-cart"></i></a>

          </form>

        </div>
      </div>
    </div>
  </body>
</html>