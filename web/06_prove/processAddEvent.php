<?php
    session_start();
    require "getDB.php";

    $db = getDB();
    
    if (!isempty($_POST)) {
        $stmt = $db->prepare("INSERT INTO calendar(eventname, eventdesc, eventdate, eventhr, eventmin, eventabbriv, user_id) 
        VALUES (:eventname, :eventdesc, :eventdate, :eventhr, :eventmin, :eventabbriv, :user_id)");

        $stmt->bindValue(":eventname", $_GET['eventName'], PDO::PARAM_STR);
        $stmt->bindValue(":eventdesc", $_GET['eventDesc'], PDO::PARAM_STR);
        $stmt->bindValue(":eventdate", $_GET['eventDate'], PDO::PARAM_STR);
        $stmt->bindValue(":eventhr", $_GET['eventHr'], PDO::PARAM_INT);
        $stmt->bindValue(":eventmin", $_GET['eventMin'], PDO::PARAM_INT);
        $stmt->bindValue(":eventabbriv", $_GET['eventAbbriv'], PDO::PARAM_STR);
        $stmt->bindValue(":user_id", $_SESSION['user_id'], PDO::PARAM_INT);
    } else {
        echo "Error: POST request was not sent.";
    }
?>