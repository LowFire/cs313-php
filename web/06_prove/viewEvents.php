<?php
  session_start();
  require "getDB.php";
  
  $db = getDB();
  $stmt = $db->prepare("SELECT eventname, eventdesc, eventdate, eventhr, eventmin, eventabbriv FROM calendar WHERE user_id=:user_id");
  $stmt->bindValue(":user_id", $_SESSION['user_id'], PDO::PARAM_INT);
  $stmt->execute();
  $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>View Events</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  
  <body class="container">
    <h1>Events</h1>
      <table class="table table-striped">
        <thead>
          <th>Name</th>
          <th>Description</th>
          <th>Date</th>
          <th>Time</th>
          <th></th>
        </thead>

        <tbody>
          <?php
            foreach ($events as $event) {
              printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%d:%2.0d %s</td></tr>", 
              $event['eventname'], $event['eventdesc'], $event['eventdate'], $event['eventhr'],
              $event['eventmin'], $event['eventabbriv']);
            }
          ?>
        </tbody>
      </table>
  </body>
</html>