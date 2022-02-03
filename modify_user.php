<?php
session_start();

require_once("database.php");


try{
    $conn = ConnectToDB();

    $data = array(  'fname' => $_POST['fname'],
                    'lname' => $_POST['lname'],
                    'email' => $_POST['email']);

    foreach($data AS $key => $value) {

        //Jos input on tyhjä se korvataan olemassa olevalla arvolla sql kyselyyn
        if(empty($value)) {

            $data[$key] = $_SESSION[$key];
        }
        else{
            //päivitetään session arvot
            $_SESSION[$key] = $value;
        }
    }
    $sql = "UPDATE Users
            SET
                user_firstname = '".$data['fname']."',
                user_lastname = '".$data['lname']."',
                user_email = '".$data['email']."'
            WHERE user_id = ".$_SESSION['userId']."";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    header('location: user.php', true, 301);
}
catch(PDOException $e){
    $e->getMessage();
};

?>