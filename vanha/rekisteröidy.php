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
        <div id="register">
            <div class="lomake">
                <form action='rekisteröidy_parse.php' method='POST'>
                    <table>
                        <tr>
                            <td>Etunimi: </td>
                            <td><input type='text' name='firstname'></td>
                        </tr>
                        <tr>
                            <td>Sukunimi: </td>
                            <td><input type='text' name='lastname'></td>
                        </tr>
                        <tr>
                            <td>Käyttäjänimi: </td>
                            <td><input type='text' name='username'></td>
                        </tr>
                        <tr>
                            <td>Salasana:</td>
                            <td><input type='password' name='password'></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type='submit' name='login' value='Rekisteröidy'></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>