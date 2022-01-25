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
            <div class="container_contact">
                <form method="POST" action="modify_user.php">
                    <div class="labels">
                        <label>ID:</label><br><br>
                        <label>Etunimi:</label><br><br>
                        <label>Sukunimi:</label><br><br>
                        <label>Sähköposti:</label><br><br>
                    </div>
                    <div class="inputs">
                        <input placeholder='<?php echo $_SESSION['userId'] ?>' readonly></innput><br><br>
                        <input placeholder='<?php echo $_SESSION['fname'] ?>'><br><br>
                        <input placeholder='<?php echo $_SESSION['lname'] ?>'><br><br>
                        <input placeholder='<?php echo $_SESSION['email'] ?>'><br><br>
                    </div>
                </form>
            </div>
        <?php include("templates/footer.php") ?>

    </div>
</body>
</html>