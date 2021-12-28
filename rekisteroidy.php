<?php

session_start();

require_once "database.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$password = $_POST['password'];
$email = $_POST['email'];

try{

    $conn = ConnectToDB();

    $stmt = $conn->prepare("INSERT INTO Users (user_firstname, user_lastname, password, user_email)
    VALUES('".$fname."', '".$lname."', '".$password."', '".$email."')");
    $stmt->execute();

    header("Location: kiitos_rek.html", true, 301);
}

catch(PDOException $e)
{
    echo $e->getMessage();
};


?>