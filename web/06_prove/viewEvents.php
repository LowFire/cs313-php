<?php
  session_start();
  require "getDB.php";
  
  $db = getDB();
  $stmt = $db->prepare("SELECT event_id, eventname, eventdesc, eventdate, eventhr, eventmin, eventabbriv FROM calendar WHERE user_id=:user_id");
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

        <tbody id="eventRows">
          <?php
            $i = 0;
            foreach ($events as $event) {
              printf("<tr id=\"r" . $i . "\"><td>%s</td><td>%s</td><td>%s</td><td>%d:%02d %s</td><td>" . 
              "<button class=\"btn btn-primary update\">Update</button>" .
              "<button class=\"btn btn-danger delete\">Delete</button></td></tr>", 
              $event['eventname'], $event['eventdesc'], $event['eventdate'], $event['eventhr'],
              $event['eventmin'], $event['eventabbriv']);
              $i++;
            }
          ?>
        </tbody>
      </table>
  </body>
</html>