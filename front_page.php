<?php

session_start(); 

date_default_timezone_set('Europe/Helsinki')

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tyyli.css">
    <title>Front page</title>
</head>
<body>
    <div class="container">
        <h1>Forum</h1>

        <ol>
            <div class="thread">
                <li><form method="POST" action="luo_aihe.php">
                        <p class="thread_topic" placeholder="">Thread topic</p></li>
                        <p class="thread_summary">Summary</p>
                        <br>
                        <p class="timestamp"> 12/22/2021 by Joonas</p>
                    </form>
                    <hr>
                </li>
            </div>

            <div class="thread">
                <li><form method="POST" action="luo_aihe.php">
                        <input name=""class="thread_topic" placeholder="Thread topic"></li>
                        <textarea maxlength="200" class="thread_summary" placeholder="content (max 200 characters)"></textarea>
                        <br>
                        <input class="thread_button" type="submit" value="Luo uusi lanka">
                        <p class="timestamp"> 12/22/2021 by Joonas</p>
                    </form>
                    <hr>
                </li>
            </div>
            
        </ol>

    </div>
</body>
</html>