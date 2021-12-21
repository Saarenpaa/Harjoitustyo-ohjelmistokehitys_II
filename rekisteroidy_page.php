<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tyyli.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Rekisteröidy</h1>
        <div class="content">
            <form method="post" action="rekisteroidy.php">
                <p><input name="fname" type="text" placeholder="Etunimi" required></p>
                <p><input name="lname" type="text" placeholder="Sukunimi" required></p>
                <p><input name="password" type="password" placeholder="Salasana" required></p>
                <p><input name="rePass" type="password" placeholder="Salasana uudestaan" required></p>
                <p><input name="email" type="text" placeholder="Sähköposti" required></p>
                <p><input type="submit" value="Rekisteröidy"></p>
            </form>
        </div>
    </div>
</body>
</html>
<?php



?>