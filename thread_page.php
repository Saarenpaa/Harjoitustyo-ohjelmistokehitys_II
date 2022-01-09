<?php

include("aut.php");

tarkistaThreadId();

session_start();

date_default_timezone_set('Europe/Helsinki');

//checkThreadIdSelection();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tyyli.css">
    <script src="scripts.js"></script>
    <title>Thread page</title>

    <!--<script type=module src=scripts.js></script>-->

</head>
<body>

    <div class="container_front">
        
        <?php include("templates/header.php") ?>
        
        <ol class="listOf_threads">
        
        <?php

            require_once("database.php");

            try{
                $conn = ConnectToDB();

                $thread_index = $_GET['thread_id'];

                $stmt_thread = $conn->prepare("SELECT Threads.*, Users.user_firstname, Users.user_lastname
                                        FROM Threads
                                        INNER JOIN Users ON Threads.user_id = Users.user_id
                                        WHERE Threads.thread_ID = ".$thread_index."");
                $stmt_thread->execute();
                $thread = $stmt_thread->fetchAll();

                $stmt_comments = $conn->prepare("SELECT Comments.*, Users.user_firstname, Users.user_lastname, Threads.thread_ID
                                                FROM ((Comments
                                                INNER JOIN Users ON Comments.user_id = Users.user_id)
                                                INNER JOIN Threads ON Comments.thread_ID = Threads.thread_ID)
                                                WHERE Comments.thread_ID = ".$thread_index."");
                $stmt_comments->execute();
                $comment = $stmt_comments->fetchAll();
            }
            catch(PDOException $e){
                $e->getMessage();
            }

            // luo aiheen pää tekstin
            foreach($thread as $row){
                echo "
                <div class='thread'>
                    <li>
                        <h1 class='thread_topic_button'>".$row['thread_topic']."</h1>
                        <img class='thread_image'></img>
                        <p class='thread_summary'>".$row['thread_summary']."</p>
                        <p class='thread_content'>".$row['thread_content']."</p>
                        <br>
                        <p class='timestamp'>".date('d.m.Y H:i', strtotime($row['thread_date']))." by ".$row['user_firstname']." ".$row['user_lastname']."</p>
                        <hr>
                    </li>
                </div>";
            };
            ?>
            <button class="new_thread_button" onclick="newComment()">Luo kommentti</button>
            <div id="new_thread" class="new_thread">
                <li><form method="POST" action="new_comment.php">
                            <textarea name="comment_content" class="comment_content" placeholder="Comment" required></textarea>
                            <!--        Get the date and time with php      v         -->
                            <input name="comment_date" <?php echo "value='".date('Y-m-d H:i')."'" ?> hidden>
                            <input name="comment_by" <?php echo "value='".$_SESSION['userId']."'" ?> hidden>
                            <input name="thread_ID" <?php echo "value='".$_GET['thread_id']."'" ?> hidden>
                            <br>
                            <input class="thread_button" type="submit" value="Kommentoi">
                    </form>
                    <hr>
                </li>
            </div>
            <div class='thread'>
                <p class='thread_topic'>Kommentit:</p>
                <select onclick="commentFilter();" name="Filter" id="filter" class="filter">
                    <option value="Uusin ensin">Uusin ensin</option>
                    <option value="Vanhin ensin">Vanhin ensin</option>
                </select>
            </div>
            <hr>

            <?php

            // tulostaa jokaisen tähän aiheeseen kuuluvan kommentin.
            foreach($comment as $row){
                echo "
                <div class='thread'>
                    <li>
                        <p class='thread_summary'>".$row['comment_content']."</p>
                        <br>
                        <p class='timestamp'>".date('d.m.Y H:i', strtotime($row['comment_date']))." by ".$row['user_firstname']." ".$row['user_lastname']."</p>
                        <hr>
                    </li>
                </div>";
            }
        ?>
            <!--comment box-->
            <button class="new_thread_button" onclick="newComment()">Luo kommentti</button>

            <div id="new_thread" class="new_thread">
                <li><form method="POST" action="new_comment.php">
                            <textarea name="comment_content" class="comment_content" placeholder="Comment" required></textarea>
                            <!--        Get the date and time with php      v         -->
                            <input name="comment_date" <?php echo "value='".date('Y-m-d H:i')."'" ?> hidden>
                            <input name="comment_by" <?php echo "value='".$_SESSION['userId']."'" ?> hidden>
                            <input name="thread_ID" <?php echo "value='".$_GET['thread_id']."'" ?> hidden>
                            <br>
                            <input class="thread_button" type="submit" value="Kommentoi">
                    </form>
                    <hr>
                </li>
            </div>
        </ol>
        <?php include("templates/footer.php") ?>
    </div>
    <script>
        commentFilter();
    </script>
</body>
</html>