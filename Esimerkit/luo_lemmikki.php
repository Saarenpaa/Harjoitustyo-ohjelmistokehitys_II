<?php

session_start();
require_once("database.php");

// Tässä skriptissä varsinaisesti lisätään uusi lemmikki tietokantaan
$ownerId = $_POST["ownerId"];
$name = $_POST["name"];
$bd = $_POST["birthday"];
$type = $_POST["type"];


try {
    // Muodostetaan yhteys tietokantaan
    $conn = avaaTietokantaYhteys();

    $stmt = $conn->prepare("INSERT INTO pets (owner_id, name, type, birthday, status) VALUES (" . $ownerId . ", '" . $name . "', '" . $type . "', '" . $bd . "', 'alive')");
    $stmt->execute();

	// Kun lemmikki on luotu tietokantaan, ohjataan käyttäjä takaisin listanäkymään
    $_SESSION["success_message"] = "Lemmikki " . $name . " lisättiin onnistuneesti!";
	header('Location: lemmikit.php?id=' . $ownerId, true, 301);
	exit;
}
catch(PDOException $e) {
    echo $e->getMessage();
}

?>