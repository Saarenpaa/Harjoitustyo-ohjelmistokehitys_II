<?php

session_start();

require_once "database.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$password = $_POST['password'];
$email = $_POST['email'];

//Salataan salasana PHP:n oletus hashing algoritmin avulla
$passInDB = password_hash($password, PASSWORD_DEFAULT);

//Syötetään käyttäjän tiedot tietokantaan ja uudelleenohjataan kiitos -sivulle
try{

    $conn = ConnectToDB();

    $stmt = $conn->prepare("INSERT INTO Users (user_firstname, user_lastname, password, user_email)
    VALUES('".$fname."', '".$lname."', '".$passInDB."', '".$email."')");
    $stmt->execute();

    header("Location: kiitos_rek.html", true, 301);
}

catch(PDOException $e)
{
    echo $e->getMessage();
};


?>