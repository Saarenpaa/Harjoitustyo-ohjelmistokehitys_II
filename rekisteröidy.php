<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foorumi</title>
    <link rel="stylesheet" href="tyyli.css"></src>
</head>
    <body>
        <div id="container">
            <form action='tietokanta_parse.php' method='POST'>
                Käyttäjänimi: <input type='text' name='username'>
                <br><br>
                Salasana: <input tupe='password' name='password'>
                <br><br>
                <input type='submit' name='login' value='Rekisteröidy'>
            </form>
        </div>
    </body>
</html>