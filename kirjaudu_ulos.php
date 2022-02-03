<?php

    session_start();
    //Tuhotaan session data -> käyttäjä kirjautuu ulos
    session_destroy();
    header('location: index.php', true, 301)

?>