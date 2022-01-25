<?php

require_once("database_config.php");
//Luo yhteyden tietokantaan
function ConnectToDB(){
    global $DB_USERNAME, $DB_PASSWORD;
    $conn = new PDO("mysql:host=mysql.cc.puv.fi;dbname=e2001398_forum_final;charset=utf8",
    $DB_USERNAME, $DB_PASSWORD);

    return $conn;
}

?>