<?php
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

$stmnt = $db->prepare('SELECT username, password FROM users');
$stmnt->execute();
$rows = $stmnt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  
  <body>
    <div class="container">
      <table class="table table-striped">
        <thead>
          <th>Username</th>
          <th>Password</th>
          <th>Calendar Link</th>
        </thead>
        <tbody>
          <?php
            foreach ($rows as $row) {
              echo '<form action="calendarEvents.php" method="POST">';
              echo '<tr>';
              echo '<td><input type="text" name="username" value="' . $row['username'] . '"></td>';
              echo '<td><input type="text" name="password" value="' . $row['password'] . '"></td>';
              echo '<td><input type="submit"></td>';
              echo '</tr>';
              echo '</form>';
            }
            ?>
        </tbody>
      </table>
    </div>
  </body>
</html>