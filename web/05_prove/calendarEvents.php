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

$stmnt = $db->prepare('SELECT user_id FROM users WHERE username = ' . $_POST['username']);
$stmnt->execute();
$rows = $stmnt->fetchAll(PDO::FETCH_ASSOC);
$id = rows[0]['user_id'];
$stmnt = $db->prepare('SELECT * FROM calendar WHERE user_id = ' . $id);
$stmnt->execute();
$rows = $stmnt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Calendar Events</title>
  </head>
  
  <body>
      <table>
          <thead>
              <th>Event Name</th>
              <th>Event Description</th>
              <th>Event Date</th>
              <th>Event Time</th>
          </thead>
          <tbody>
              <?php
                foreach ($rows as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['eventname'] . '</td>';
                    echo '<td>' . $row['eventdesc'] . '</td>';
                    echo '<td>' . $row['eventdate'] . '</td>';
                    echo '<td>' . $row['eventhr'] . ':' . $row['eventmin'] . ' ' . $row['eventabbriv'] . '</td>';
                    echo '</tr>';
                }
              ?>
          </tbody>
      </table>
  </body>
</html>