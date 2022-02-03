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
    <title>User info</title>

    <!--<script type=module src=scripts.js></script>-->

</head>
<body>
<?php

require_once('database.php');

?>

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
                        <input name='userId' placeholder='<?php echo $_SESSION['userId'] ?>' readonly></innput><br><br>
                        <input name='fname' placeholder='<?php echo $_SESSION['fname'] ?>'><br><br>
                        <input name='lname' placeholder='<?php echo $_SESSION['lname'] ?>'><br><br>
                        <input name='email' placeholder='<?php echo $_SESSION['email'] ?>'><br><br>
                    </div>
                    <div>
                        <button class="new_thread_button" style="margin-left: 105px; width: auto;">Muuta tietoja</button>
                    </div>
                </form>
            </div>
        <?php include("templates/footer.php") ?>

    </div>
</body>
</html>