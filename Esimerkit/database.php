<?php

require_once("config.php");

function avaaTietokantaYhteys() {
    global $DB_USERNAME, $DB_PASSWORD; 
    $conn = new PDO("mysql:host=mysql.cc.puv.fi;dbname=msl_testi",
        $DB_USERNAME, $DB_PASSWORD);

    return $conn;
}


function haeOmistajanNykyisetLemmikit($ownerId) {
    return "SELECT * from pets WHERE owner_id=". $ownerId . " AND status='alive'";
}


function haeOmistajanEntisetLemmikit($ownerId) {
    return "SELECT * from pets WHERE owner_id=". $ownerId . " AND NOT status='alive'";
}

?>