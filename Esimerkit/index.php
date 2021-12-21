<?php

session_start();
?>

<html>
    <head>
        <link rel="stylesheet" href="app.css">
        <title>Kirjaudu lemmikkisovellukseen</title>
    </head>
<body>

<h1>Kirjautuminen</h1>

<!-- Kirjautumislomake lähettää syötetyt tiedot kirjaudu.php skriptille -->
<form method="POST" action="kirjaudu.php">
    <?php
        if(isset($_SESSION["email_error"]) === true) {
            echo "<p style='color:red'>" . $_SESSION["email_error"] . "</p>";
        }

        $_SESSION["email_error"] = null;
    ?>
    <p><input type="text" name="email" placeholder="Sähköposti" required></p>
    <p><input type="password" name="password" placeholder="Salasana" required></p>
    <p><input type="submit" value="Kirjaudu"></p>
</form>

</body>
</html>