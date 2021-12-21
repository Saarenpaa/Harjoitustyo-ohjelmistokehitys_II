<?php session_start(); ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirjaudu</title>
    <link rel="stylesheet" href="tyyli.css">
</head>
<body>
    <div class="containerKirjaudu">
        <div class="topbar">
            <h1 class="titleKirjaudu">Kirjaudu</h1>
        </div>
        <div class="formdiv">
            <form method="post" action="kirjaudu.php">
                <?php
                    if(isset($_SESSION["email_error"]) === true) {
                        echo "<div style='color:red'>" . $_SESSION["email_error"] . "</div>";
                    }

                    $_SESSION["email_error"] = null;
                ?>
                <table>
                    <div>
                        <div>Käyttäjätunnus:</div>
                        <div><input name="username" type="text" required></div>
                    </div>
                    <div>
                        <div>Salasana:</div>
                        <div><input name="password" type="password" required></div>
                    </div>
                    <div>
                        <div></div>
                        <div><input type="submit" value="Kirjaudu sisään"></div>
                    </div>
                </table>
            </form>
        </div>
    </div>
</body>
</html>