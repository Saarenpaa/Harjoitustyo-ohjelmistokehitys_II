<?php

//1.Kirjaudu tietokantaan
require_once "database.php";

//2.
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, username, password)
                        VALUES ('$firstName', '$lastName', '$username', '$password')");
$stmt->execute();
if($stmt->execute()){
    echo "Rekisteröityminen onnistui";
}

?>