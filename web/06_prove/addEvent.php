<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  
  <body class="container">
    <h1>Add New Event</h1>

    <form action="processAddEvent.php" method="POST" class="form">
      <div class="form-group">

        <!-- Event Name -->
        <div class="form-group">
          <label for="eventName">Event Name</label>
          <input type="text" id="eventName" name="eventName">
        </div>

        <!-- Event Description -->
        <div class="form-group">
          <label for="eventDesc">Event Description</label>
          <input type="text" id="eventDesc" name="eventDesc">
        </div>

        <!-- Event Date -->
        <div class="form-group">
          <label for="date">Event Date</label>
          <input type="date" id="date" name="date">
        </div>

        <!-- Event Time -->
        <div class="form-group">
          <label for="hr">Hour</label>
          <input type="number" id="hr" name="hr" max="12" min="1">
          <label for="min">Minute</label>
          <input type="number" id="min" name="min" max="59" min="0">
          <select name="abbriv" id="abbriv">
            <option value="PM">PM</option>
            <option value="AM">AM</option>
          </select>
        </div>

        <input type="submit">
      </div>
    </form>
  </body>
</html>