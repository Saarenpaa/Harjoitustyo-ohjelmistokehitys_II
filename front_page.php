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
        <div class="header">
            <div class="header_title"><a href="#">Tervetuloa Foorumille</a></div>
            <div class="user_info">
                <a href="#"><?php
                    $fname = $_SESSION['fname'];
                    $lname = $_SESSION['lname'];

                    echo $fname." ".$lname."!";
                ?></a>
            </div>
            <div class="header_links">
                <a href="#">Home</a>
                <a href="#">Contacts</a>
                <a href="#">FAQ</a>
            </div>
        </div>



        <ol class="listOf_threads">
        <button class="new_thread_button" onclick="newComment()">Luo uusi lanka</button>

        <!--comment box-->
        <div id="new_thread" class="new_thread">
            <li><form method="POST" action="new_thread.php">
                        <img name="" title="kuva" class="thread_img" type="image">
                        <input name="thread_img" type="file" accept ="image/png, image/jpeg" id="thread_img"><br>
                        <input name="thread_topic" name="topic" class="thread_topic" placeholder="Topic" required>
                        <textarea name="thread_summary" maxlength="100" class="thread_summary" placeholder="Summary (max 100 characters)" required></textarea>
                        <textarea name="thread_content" class="thread_content" placeholder="Content" required></textarea>
                        <!--        Get the date and time with php      v         -->
                        <input name="thread_date" <?php echo "value='".date('Y-m-d H:i')."'"; ?> hidden>
                        <input name="thread_by" <?php echo "value='".$_SESSION['userId']."'" ?> hidden>
                        <br>
                        <input class="thread_button" type="submit" value="Post">
                </form>
                <hr>
            </li>
        </div>
        <?php

            require_once("database.php");

            try{
                $conn = ConnectToDB();

                $stmt = $conn->prepare("SELECT Threads.*, Users.user_firstname, Users.user_lastname
                                        FROM Threads
                                            INNER JOIN Users ON Threads.user_id = Users.user_id
                                            ORDER BY thread_date");
                $stmt->execute();
                $thread = $stmt->fetchAll();
            }
            catch(PDOException $e){
                $e->getMessage();
            }

            foreach($thread as $row){
                echo "
                <div class='thread'>
                    <li>
                        <form method='GET' action ='thread_page.php'>
                        <input name='thread_id' type='text' value=".$row['thread_ID']." hidden>
                        <input type='submit' value=".$row['thread_topic']." class='thread_topic_button'>
                        </form>
                        <img class='thread_image'></img>
                        <p class='thread_summary'>".$row['thread_summary']."</p>
                        <br>
                        <p class='timestamp'>".date('d.m.Y H:i', strtotime($row['thread_date']))." by ".$row['user_firstname']." ".$row['user_lastname']."</p>
                        <hr>
                    </li>
                </div>";
            }
        ?>
        </ol>
        <div class="footer">
            <h1>Footer</h1>
        </div>
    </div>
</body>
</html>