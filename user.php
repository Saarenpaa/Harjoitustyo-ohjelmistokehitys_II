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
    <title>Front page</title>

    <!--<script type=module src=scripts.js></script>-->

</head>
<body>

    <div class="container_front">
        
        <?php include("templates/header.php") ?>

        <ol class="listOf_threads">
            <div>
                <li>
                    <form>
                        <label>Nimi:</label><input placeholder='<?php $_SESSION['fname'] ?>'>
                    </form>
                </li>
            </div>
        </ol>

        <?php include("templates/footer.php") ?>

    </div>
</body>
</html>