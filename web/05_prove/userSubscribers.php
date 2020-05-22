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

$stmnt = $db->prepare('SELECT username, user_id FROM users');
$stmnt->execute();
$users = $stmnt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>User Subscribers</title>
  </head>
  
  <body class="container">
    <table class="table table-striped">
      <thead>
        <th>User</th>
        <th>Subscribers</th>
      </thead>
      <tbody>
        <?php
          foreach ($users as $user) {
            $stmnt = $db->prepare('SELECT username FROM users, subscribers WHERE user_id=user_sub_id AND subscribee_id=:id');
            $stmnt->execute(array(':id' => $user['user_id']));
            $subscribers = $stmnt->fetchAll(PDO::FETCH_ASSOC);
            $lastKey = array_key_last($subscribers);

            echo '<tr>';
            echo '<td>' . $user['username'] . '</td>';
            echo '<td>';
            foreach($subscribers as $subscriber) {
              echo $subscriber['username'];
              if (key($subscribers != $lastKey))
                echo ', ';
            }
            echo '</td>';
            echo '</tr>';
          }
        ?>
      </tbody>
    </table>
  </body>
</html>