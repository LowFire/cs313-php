<?php
    require "getDB.php";
    $db = getDB();
    $eventname = $_REQUEST['eventname'];
    $eventdesc = $_REQUEST['eventdesc'];
    $eventdate = $_REQUEST['eventdate'];
    $eventhr = intval($_REQUEST['eventhr']);
    $eventmin = intval($_REQUEST['eventmin']);
    $eventabbriv = $_REQUEST['eventabbriv'];
    $event_id = intval($_REQUEST['event_id']);

    $updatestmt = $db->prepare("UPDATE calendar SET eventname=:eventname, eventdesc=:eventdesc, " . 
    "eventdate=:eventdate, eventhr=:eventhr, eventmin=:eventmin, eventabbriv=:eventabbriv " .
    "WHERE event_id=:event_id");
    $updatestmt->bindValue(":eventname", $eventname, PDO::PARAM_STR);
    $updatestmt->bindValue(":eventdesc", $eventdesc, PDO::PARAM_STR);
    $updatestmt->bindValue(":eventdate", $eventdate, PDO::PARAM_STR);
    $updatestmt->bindValue(":eventhr", $eventhr, PDO::PARAM_INT);
    $updatestmt->bindValue(":eventmin", $eventmin, PDO::PARAM_INT);
    $updatestmt->bindValue(":eventabbriv", $eventabbriv, PDO::PARAM_STR);
    $updatestmt->bindValue(":event_id", $event_id, PDO::PARAM_INT);

    $updatestmt->execute();
    
    $getstmt = $db->prepare("SELECT eventname, eventdesc, eventdate, eventhr, eventmin, eventabbriv FROM calendar WHERE event_id=:event_id");
    $getstmt->bindValue(":event_id", $event_id, PDO::PARAM_INT);
    $getstmt->execute();
    $eventData = $getstmt->fetch(PDO::FETCH_ASSOC);

    echo "<td data-event_id=\"" . $eventData['event_id'] . "\">" . 
        "<td>" . $eventData['eventname'] . "</td>" . 
        "<td>" . $eventData['eventdesc'] . "</td>" .
        "<td>" . $eventData['eventdate']. "</td>" .
        "<td>" . $eventData['eventhr'] . ":" . $eventData['eventmin'] . " " . $eventData['eventabbriv'] . "</td>" .
        "</tr>";
?>