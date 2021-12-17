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
            <form action='kirjaudu_parse.php' method='POST'>
                <table>
                    <tr>
                        <td>Käyttäjänimi: </td>
                        <td><input type='text' name='username'></td>
                    </tr>
                    <tr>
                        <td>Salasana:</td>
                        <td><input tupe='password' name='password'></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type='submit' name='login' value='Kirjaudu'></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>