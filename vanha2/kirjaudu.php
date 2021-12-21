<?php

session_start();

require_once("database.php");


$username = $_POST['username'];
$pw = $_POST['password'];

try {
    // Muodostetaan yhteys tietokantaan
    $conn = ConnectToDB();

    $stmt = $conn->prepare("SELECT * from users WHERE username='". $username . "'");
    $stmt->execute();

    $data = $stmt->fetchAll(); // array[][] - taulukko


	if(count($data) === 1)
	{
		// Käyttäjänimi täsmää
		$users = $data[0]; // array[] - "id" => x, "password" => x
		$pwInDB = $users["password"];
		$usernameInDB = $users["username"];
		$userId = $users["user_id"];
		
		// Tarkista salasana
		if(strcmp($pw, $pwInDB) === 0) {
			// Annettu salasana täsmää tietokannassa tallennetun arvon kanssa
			// Päästetän käyttäjä sisään sovellukseen
			// Tallennetaan käyttäjän tiedot istuntoon
			//$_SESSION["userId"] = $userId;
			//$_SESSION["username"] = $usernameInDB;
			header("Location: front_page.html", true, 301);
			exit;
		}
		else {
			// Salasana on virheellinen
			$_SESSION["email_error"] = "Väärä salasana.";
			header("Location: index.php", true, 301);
			exit;
		}
	}
	else
	{
		// Joku muu, ei löydy käyttäjä tai useampi
		$_SESSION["email_error"] = "Käyttäjänimeä ei löydy.";
		header("Location: index.php", true, 301);
		exit;
	}
	
}
catch(PDOException $e) {
    echo $e->getMessage();
}



?>