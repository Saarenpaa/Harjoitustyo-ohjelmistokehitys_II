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
    <title>FAQ</title>

    <!--<script type=module src=scripts.js></script>-->

</head>
<body>



    <div class="container_front">
        
        <?php include("templates/header.php") ?>

        <ol class="listOf_threads">

            <li>
                <div class="question_border">
                    <button class="question">Mikä on foorumi?</button>
                    <div class="answer">
                        <hr>
                        <p>foorumi on Joonas Saarenpään PHP- ja JavaScript kielellä harjoitustyönä toteuttama internetsivusto.</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="question_border">
                    <button class="question">Oliko harjoitustyö helppo?</button>
                    <div class="answer">
                        <hr>
                        <p>Ei ollut, mutta opin paljon!</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="question_border">
                    <button class="question">Mikä harjoitustyön teossa oli parasta?</button>
                    <div class="answer">
                        <hr>
                        <p>Parasta oli projektin aloittaminen täysin nolla viivalta
                            ja sen saattaminen loppuun. Tämä oli ensimmäinen oikeasti suuri projekti
                            missä pääsi paneutumaan todella moneen uuteen asiaan tarkemmin.
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <div class="question_border">
                    <button class="question">Mitä olisit halunnunt vielä lisätä projektiin?</button>
                    <div class="answer">
                        <hr>
                        <p>Olisin halunnut lisätä enemmän ominaisuuksia ja tutustua vielä JavaScriptin muihin
                            teknologioihin, kuten esimerkiksi AJAX:iin.
                        </p>
                    </div>
                </div>
            </li>

        </ol>

        <?php include("templates/footer.php") ?>

    </div>
    <script>
        Collapsible('question');
    </script>
</body>
</html>