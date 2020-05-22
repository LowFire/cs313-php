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

$stmnt = $db->prepare('SELECT * FROM users');
$stmnt->execute();
$rows = $stmnt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Users</title>
  </head>
  
  <body>
      <table>
        <thead>
          <th>Username</th>
          <th>Password</th>
          <th>Calendar Link</th>
        </thead>
        <tbody>
          <?php
            foreach ($rows as $row) {
              echo '<tr>';
              echo '<td>' . $row['username'] . '</td>';
              echo '<td>' . $row['password'] . '</td>';
              echo '<td><a href=\"calendarEvents.php\">Calendar</a></td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
  </body>
</html>