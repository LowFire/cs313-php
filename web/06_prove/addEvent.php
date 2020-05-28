<!DOCTYPE html>
<html>
  <head>
    <title>Add Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  
  <body class="container">
    <form action="addEvent.php" class="form">
      <div class="form-group">

        <!-- Event Name -->
        <label for="eventName">Event Name</label>
        <input type="text" id="eventName" name="eventName">

        <!-- Event Description -->
        <label for="eventDesc">Event Description</label>
        <input type="text" id="eventDesc" name="eventName">

        <!-- Event Date -->
        <label for="date">Event Date</label>
        <input type="date" id="date" name="date">

        <!-- Event Time -->
        <div class="form-group">
          <label for="hr">Hour</label>
          <input type="number" id="hr" name="hr">
          <label for="min">Minute</label>
          <input type="text" id="min" name="min">
          <optgroup name="abbriv">
            <option value="PM">PM</option>
            <option value="AM">AM</option>
          </optgroup>
        </div>
      </div>
    </form>
  </body>
</html>