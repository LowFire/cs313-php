<?php
    require "getDB.php";
    $db = getDB();
    $event_id = intval($_REQUEST['event_id']);

    $deletestmt = $db->prepare("DELETE FROM calendar WHERE event_id=:event_id");
    $deletestmt->bindValue(":event_id", $event_id, PDO::PARAM_INT);
    $deletestmt->execute();
?>