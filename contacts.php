<?php

session_start();

date_default_timezone_set('Europe/Helsinki');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tyyli.css">
    <script src="scripts.js"></script>
    <title>Contact us</title>

    <!--<script type=module src=scripts.js></script>-->

</head>
<body>

    <div class="container_front">
        
        <?php include("templates/header.php") ?>
        <div class="container_contact">
        <ol class="listOf_threads">

            <h1>Ylläpitäjän yhteystiedot:</h1>
            <span>Puhnro: 050123123</span><br>
            <span>sposti: mail@mail.com</span>

            <!-- Oli tarkoituksena tehdä phpllä email boxi mutta käsitin että se ei olisi toiminut u-levyllä -->
            <form method="POST" action="mail.php">
                <h1>Lähetä tukeen sähköpostia:</h1>
                <a href="mailto: ylläpitäjä@ei_oikea_sposti.fi">ylläpitäjä@ei_oikea_sposti.fi</a>
            </form>
        </ol>
        </div>
        <?php include("templates/footer.php") ?>

    </div>
</body>
</html>