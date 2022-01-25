<?php

session_start();

include("aut.php");

// Tarkistaa, että thread id on valittu, ettei tule erroreita.
tarkistaThreadId();

date_default_timezone_set('Europe/Helsinki');

//Uuden kommentin template
function commentBox(){
    $date = date('Y-m-d H:i');
    echo'
        <button class="new_thread_button">Kommentoi</button>

        <div id="new_thread" class="new_thread">
            <li><form method="POST" action="new_comment.php">
                        <textarea name="comment_content" class="comment_content" placeholder="Comment" required></textarea>
                        <!--        Get the date and time with php      v         -->
                        <input name="comment_date" value="'.$date.'" hidden>
                        <input name="comment_by" value="'.$_SESSION['userId'].'" hidden>
                        <input name="thread_ID" value="'.$_GET['thread_id'].'" hidden>
                        <br>
                        <input class="thread_button" type="submit" value="Lähetä">
                </form>
                <hr>
            </li>
        </div>';
}

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
        <!-- Sama toimintatapa kuin etusivulla -->
        <ol class="listOf_threads">
        
        <?php

            require_once("database.php");

            try{
                $conn = ConnectToDB();
        
                $thread_index = $_GET['thread_id'];
                
                //Haetaan langan aiheen tiedot
                $stmt_thread = $conn->prepare("SELECT Threads.*, Users.user_firstname, Users.user_lastname
                                               FROM Threads
                                               INNER JOIN Users ON Threads.user_id = Users.user_id
                                               WHERE Threads.thread_ID = ".$thread_index."");
                $stmt_thread->execute();
                $thread = $stmt_thread->fetchAll(PDO::FETCH_ASSOC);
                
                if(isset($_GET['sort']) && strlen(trim($_GET['sort'])) > 0){
                    $sort = trim($_GET['sort']);
                }
                else{
                    $sort = 'DESC';
                }

                $sqlComments="SELECT Comments.*, Users.user_firstname, Users.user_lastname, Threads.thread_ID
                              FROM ((Comments
                              INNER JOIN Users ON Comments.user_id = Users.user_id)
                              INNER JOIN Threads ON Comments.thread_ID = Threads.thread_ID)
                              WHERE Comments.thread_ID = :thread_index
                              ORDER BY Comments.Comment_date ".$sort."";



                //Haetaan kommenttien tiedot
                $stmt_comments = $conn->prepare($sqlComments);
                $stmt_comments->bindParam(':thread_index', $thread_index);
                $stmt_comments->execute();

                $comment = $stmt_comments->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(PDOException $e){
                $e->getMessage();
            };
            // luo langan aihe
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
            // funktio joka säilyttää select tagin valinnan
            function getSelection(){
                if(!empty($_GET['sort']) && $_GET['sort'] == 'ASC'){
                    echo 'selected';
                }
            }
            //Uuden kommentin template
            commentBox();
            ?>
            <div class='thread'>
                <p class='thread_topic'>Kommentit:</p>
            <!-- kommenttien filteröinti -->
                    <input value="<?php echo $_GET['thread_id'] ?>" name="thread_id" type="hidden">
                    <select onchange="location = this.value;" name="sort" id="sort" class="sort">
                        <option value="thread_page.php?<?php echo 'thread_id='.$thread_index.''?>&sort=DESC">Uusin ensin</option>
                        <option value="thread_page.php?<?php echo 'thread_id='.$thread_index.''?>&sort=ASC" <?php getSelection(); ?>>Vanhin ensin</option>
                    </select>
            </div>


            <hr>

            <?php

            //Tulostaa jokaisen tähän lankaan kuuluvan kommentin kommenttiosioon.
            foreach($comment as $row){
                echo "
                <div class='thread' id='".$row['comment_ID']."'>
                    <li>
                        <p class='thread_summary'>".$row['comment_content']."</p>
                        <br>
                        <p class='timestamp'>".date('d.m.Y H:i', strtotime($row['comment_date']))." by ".$row['user_firstname']." ".$row['user_lastname']."</p>
                        <hr>
                    </li>
                </div>";
            }

            //Uuden kommentin template
            commentBox();
        ?>
        </ol>
        <?php include("templates/footer.php") ?>
    </div>
    <script>
        //commentFilter();
        Collapsible('new_thread_button');
    </script>
</body>
</html>