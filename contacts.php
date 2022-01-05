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

        <ol class="listOf_threads">

            <h1>Ylläpitäjän yhteystiedot:</h1>
            <span>Puhnro: 050123123</span><br>
            <span>sposti: mail@mail.com</span>

            <!-- toimii vain localhostilla, koska pitäisi muokata php. ini tiedostoa -->
            <form method="POST" action="mail.php">
                <h1>Lähetä tukeen sähköpostia <br><span class="italic_span">
                    (luovutin koska ei toimisi koulun servulla)</span>:</h1>
                <label>Sähköposti:<br><?php echo $_SESSION['email'] ?></label><br><br>
                <label>Aihe: </label><br><input type="text" name="aihe"><br><br>
                <textarea class="thread_content" name="message"></textarea>
                <br>
                <input class="thread_button" type="submit" value="Lähetä">
            </form>
        </ol>

        <?php include("templates/footer.php") ?>

    </div>
</body>
</html>