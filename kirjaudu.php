<?php

session_start();

require_once("database.php");


$email = $_POST['email'];
$password = $_POST['password'];

try {
    // Muodostetaan yhteys tietokantaan
    $conn = ConnectToDB();

    $stmt = $conn->prepare("SELECT * from users WHERE user_email='". $email . "'");
    $stmt->execute();

    $data = $stmt->fetchAll(); // luo arrayn haetuista tiedoista

	// Suorittaa jos käyttäjän tietoja löytyy
	if(count($data) === 1)
	{
		$users = $data[0]; // array[] - "id" => x, "password" => x

		$pwInDB = $users["password"];
		$emailInDB = $users["user_email"];
		$userId = $users["user_id"];
		$fname = $users["user_firstname"];
		$lname = $users["user_lastname"];

		// Tarkista salasana
		if(strcmp($password, $pwInDB) === 0) {

			// Tallenna tiedot sessioon
			$_SESSION['userId'] = $userId;
			$_SESSION['email'] = $emailInDB;
			$_SESSION['fname'] = $fname;
			$_SESSION['lname'] = $lname;

			//Päästä käyttäjä sisälle
			header("Location: front_page.php", true, 301);
			exit;
		}
		else {
			// Salasana on virheellinen
			$_SESSION['email_error'] = "Väärä salasana.";
			header("Location: index.php", true, 301);
			exit;
		}
	}
	else
	{
		// Käyttäjää ei ole tai löytyy useampi
		$_SESSION['email_error'] = "Väärä sähköposti";
		header('Location: index.php', true, 301);
		exit;
	}
	
}
catch(PDOException $e) {
    echo $e->getMessage();
}



?>