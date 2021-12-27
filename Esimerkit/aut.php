<?php

function tarkistaEttäOnKirjautunut() {
    // Tarkistaa, että käyttäjä on kirjautuneena sisälle
    if(isset($_SESSION["userId"]) === false)
    {
        header("Location: index.php", true, 301);
        exit;
    }
}

?>