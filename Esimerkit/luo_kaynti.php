<?php

require_once("database.php");
// Tässä skriptissä varsinaisesti lisätään uusi EL-käynti tietokantaan
$petId = $_POST["petId"];
$date = $_POST["date"];
$time = $_POST["time"];
$reason = $_POST["reason"];


try {
    // Muodostetaan yhteys tietokantaan
    $conn = avaaTietokantaYhteys();

    // "2021-11-01" ja "23:30" 
    /*var_dump($date);
    var_dump($time);
    exit;*/
    $dt = $date . "T" . $time . ":00+03:00";

    $stmt = $conn->prepare("INSERT INTO vet_visits (pet_id, reason, datetime) VALUES (" . $petId . ", '" . $reason . "', '" . $dt . "')");
    $stmt->execute();

	// Kun käynti on luotu tietokantaan, ohjataan käyttäjä takaisin lemmikin näkymään
	header('Location: lemmikki.php?id=' . $petId, true, 301);
	exit;
}
catch(PDOException $e) {
    echo $e->getMessage();
}

?>