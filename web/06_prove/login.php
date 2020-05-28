<?php
  require "getDB.php";
  session_start();

    $db = getDB();
    $success = true;

  if (isset($_POST['username'])) {
    $stmt = $db->prepare("SELECT user_id FROM users WHERE username=:username AND password=:password");
    $stmt->bindValue(":username", $_POST['username'], PDO::PARAM_STR);
    $stmt->bindValue(":password", $_POST['password'], PDO::PARAM_STR);
    $stmt->execute();
    $userId = $stmt->fetch(PDO::FETCH_ASSOC)[0];
    if (!isset($userId)) {
      $success = false;
    }
  }

  if (isset($userId)){
    $_SESSION['user_id'] = $userId;
    header("06_prove.php");
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  
  <body class="container">
    <h1>Login</h1>

    <form action="login.php" method="POST" class="form">
      <div class="form-group">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username">
      </div>

      <div class="form-group">
        <label for="password">Password: </label>
        <input type="password" id="password" name="password">
      </div>

      <div class="form-group">
        <button type="submit">Login</button>
      </div>
    </form>

    <?php 
      if (!$success && isset($_POST['username']))
        echo "<p>Username or password is incorrect.</p>";
    ?>
  </body>
</html>