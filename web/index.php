<!DOCTYPE html>
<html>
  <head>
    <title>Dallin's Home Page</title>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="homepage.css">
  </head>
  
  <body>
    <div id="bg-image"></div>
    
    <div class="greenStyle container jumbotron text-center pb-2">
      <h1>Hello, My Name is Dallin Lovin</h1>
      <p>And welcome to my page!</p>
      <?php echo "<p>" . date(m d, y  h:i a) . "</p>";?>
    </div>
    
    <div class="container d-flex justify-content-between">
      <div class="greenStyle card col-4 p-4 align-self-center">
        <img class="card-img-top" src="profile.jpg">
      </div>
      <div class="greenStyle card col-6">
        <div class="card-body">
          <h3 class="card-title display-4">About Me</h3>
          <p class="card-text">I am an avid programmer. My favorite programming language is C++ because it's a fun language to use. I also have some experience in Java and JavaScript. I also love digital art. I own a Wacom tablet that I use to create illustrations in Photoshop. I also like music and play 3 different instruments. Those instruments are guitar, piano and violin. Finally, I love to cook. I prepare a Sunday dinner for my family every week.</p>
          <a class="btn btn-success d-flex" href="#">Assignments</a>
        </div>
      </div>
    </div>
    
  </body>
</html>