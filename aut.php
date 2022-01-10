<?php
function tarkistaUserId() {
    // Tarkistaa, että käyttäjä on kirjautuneena sisälle
    if(isset($_SESSION["userId"]) === false)
    {
        header("Location: index.php", true, 301);
        exit;
    }
}

function tarkistaThreadId() {
    // Tarkistaa, että thread id on valittu, ettei tule erroreita.
    if(isset($_GET['thread_id']) === false)
    {
        header("Location: front_page.php", true, 301);
        exit;
    }
}
?>