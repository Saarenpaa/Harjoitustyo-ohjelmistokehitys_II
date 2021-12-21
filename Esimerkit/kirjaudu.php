<?php

session_start();

require_once("database.php");


$email = $_POST['email'];
$pw = $_POST['password'];

// Tarkistaa tietokannasta, että

// 1. Löytyy käyttäjä tällä s-postiosoitteella
// 2. Käyttäjä syötti oikean salasanan
// 3. Jos syötti oikean salasanan --> ohjataan eteenpäin sovellukseen
//    Tai jos oli väärä, paluu kirjautumisivulle

$emailSanitized = filter_var($email, FILTER_SANITIZE_EMAIL);
$emailValid = filter_var($emailSanitized, FILTER_VALIDATE_EMAIL);
if($emailValid === false) {
	// Jos sähköpostiosoite ei näytä olevan OK
	// Ohjaa käyttäjä takaisin kirjautumissivulle
	// Asetetaan virheviesti istuntoon
	$_SESSION["email_error"] = "Sähköposti ei ole oikeaa muotoa.";
	header("Location: index.php", true, 301);
	exit;
}

try {
    // Muodostetaan yhteys tietokantaan
    $conn = avaaTietokantaYhteys();

    $stmt = $conn->prepare("SELECT * from users WHERE email='". $emailValid . "'");
    $stmt->execute();

    $data = $stmt->fetchAll(); // array[][] - taulukko
	
	if(count($data) === 1)
	{
		// Löytyi yksi käyttäjä jonka sähköpostiosoite täsmää
		$user = $data[0]; // array[] - "id" => x, "password" => x
		$pwTietokannasta = $user["password"];
		$userName = $user["name"];
		$userId = $user["id"];
		
		// Tarkistaa salasana
		if(strcmp($pw, $pwTietokannasta) === 0) {
			// Annettu salasana täsmää tietokannassa tallennetun arvon kanssa
			// Päästetän käyttäjä sisään sovellukseen
			// Tallennetaan käyttäjän tiedot istuntoon
			$_SESSION["userId"] = $userId;
			$_SESSION["userName"] = $userName;
			header("Location: lemmikit.php", true, 301);
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
		$_SESSION["email_error"] = "Sähköpostia ei löydy.";
		header("Location: index.php", true, 301);
		exit;
	}
	
}
catch(PDOException $e) {
    echo $e->getMessage();
}



?>