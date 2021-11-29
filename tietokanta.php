<?php

    $servername = "mysql.cc.puv.fi";
    $dbname = "e2001398_forum";
    $username = "e2001398";
    $password = "r2k4gpHRxMEQ";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        //PDOException jos tapahtuu virhe
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Yhteys onnistui";
        $stmt = $conn->prepare("SELECT id, firstname, lastname FROM users");
        // Suoritetaan kysely
        $stmt->execute();
        // Haetaan kyselyn palauttamat tulokset
        $data = $stmt->fetchAll();
    }
    catch (PDOException $e) {
        echo "Tapahtui PDO virhe: " . $e->getMessage();
    }


?>