<?php
    session_start();
    require "getDB.php";

    $db = getDB();

    if (!isempty($_POST)) {
        $stmt = $db->prepare("INSERT INTO calendar(eventname, eventdesc, eventdate, eventhr, eventmin, eventabbriv, user_id) 
        VALUES (:eventname, :eventdesc, :eventdate, :eventhr, :eventmin, :eventabbriv, :user_id)");
        $array = [":eventname" => $_POST['eventName'], ":eventdesc" => $_POST['eventDesc'], ":eventdate" => $_POST['date'], 
            ":eventhr" => intval($_POST['hr']), ":eventmin" => intval($_POST['min']), ":eventabbriv" => $_POST['abbriv'], 
            ":user_id" => $_SESSION['user_id']];

        $stmt->execute($array);
    } else {
        echo "Error: POST request was not sent.";
    }
?>