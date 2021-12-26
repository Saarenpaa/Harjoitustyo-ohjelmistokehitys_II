<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tyyli.css">
    <title>Kirjaudu sisään</title>
</head>
<body>
    <div class="container_kirjaudu">

        <h1>Tervetuloa!
        </h1>
        <div class="content" action="kirjaudu.php">
            <form method="post" action="kirjaudu.php">
                <?php   if(isset($_SESSION['email_error'])){

                        echo '<p>'.$_SESSION['email_error'].'</p>';

                        };   ?>
                <p><input name="email" type="text" placeholder="Sähköposti" required></p>
                <p><input name="password" type="password" placeholder="Salasana" required></p>
                <p><input class="thread_button" type="submit" value="Kirjaudu"></p>
                <p>Tai</p>
                <p><a href="rekisteroidy_page.php">Luo uusi käyttäjä</a></p>
            </form>

        </div>
    </div>
</body>
</html>