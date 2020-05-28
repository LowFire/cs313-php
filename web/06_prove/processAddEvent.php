<?php
    session_start();
    require "getDB.php";

    $db = getDB();

    if (!isempty($_POST)) {
        $stmt = $db->prepare("INSERT INTO calendar(eventname, eventdesc, eventdate, eventhr, eventmin, eventabbriv, user_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");

        $stmt->bindValue("?", $_POST['eventName'], PDO::PARAM_STR);
        $stmt->bindValue("?", $_POST['eventDesc'], PDO::PARAM_STR);
        $stmt->bindValue("?", $_POST['date'], PDO::PARAM_STR);
        $stmt->bindValue("?", intval($_POST['hr']), PDO::PARAM_INT);
        $stmt->bindValue("?", intval($_POST['min']), PDO::PARAM_INT);
        $stmt->bindValue("?", $_POST['abbriv'], PDO::PARAM_STR);
        $stmt->bindValue("?", $_SESSION['user_id'], PDO::PARAM_INT);

        // $stmt->execute();
    } else {
        echo "Error: POST request was not sent.";
    }
?>