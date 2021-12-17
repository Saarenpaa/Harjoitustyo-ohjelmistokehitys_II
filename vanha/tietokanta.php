<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$servername = "mysql.cc.puv.fi";
$dbname = "e2001398_forum";
$username = "e2001398";
$password = "r2k4gpHRxMEQ";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    //PDOException jos tapahtuu virhe
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Yhteys onnistui";
    // $stmt = $conn->prepare("SELECT id, firstname, lastname FROM users");
    // // Suoritetaan kysely
    // $stmt->execute();
    // // Haetaan kyselyn palauttamat tulokset
    // $data = $stmt->fetchAll();
}
catch (PDOException $e) {
    echo "<p>'Tapahtui PDO virhe: ' . $e->getMessage();<p>";
}

?>
</body>
</html>