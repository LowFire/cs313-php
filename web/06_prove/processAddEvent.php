<?php
    session_start();
    require "getDB.php";

    $db = getDB();

    if (!isempty($_POST)) {
        $stmt = $db->prepare("INSERT INTO calendar(eventname, eventdesc, eventdate, eventhr, eventmin, eventabbriv, user_id) 
        VALUES (:eventname, :eventdesc, :eventdate, :eventhr, :eventmin, :eventabbriv, :user_id)");

        //$stmt->bindValue(":eventname", $_POST['eventName'], PDO::PARAM_STR);
        //$stmt->bindValue(":eventdesc", $_POST['eventDesc'], PDO::PARAM_STR);
        //$stmt->bindValue(":eventdate", $_POST['date'], PDO::PARAM_STR);
        //$stmt->bindValue(":eventhr", intval($_POST['hr']), PDO::PARAM_INT);
        //$stmt->bindValue(":eventmin", intval($_POST['min']), PDO::PARAM_INT);
        //$stmt->bindValue(":eventabbriv", $_POST['abbriv'], PDO::PARAM_STR);
        $stmt->bindValue(":user_id", $_SESSION['user_id'], PDO::PARAM_INT);

        // $stmt->execute();
    } else {
        echo "Error: POST request was not sent.";
    }
?>