<?php

require_once('database.php');

//get new thread from form using POST
$thread_topic = $_POST['thread_topic'];
$thread_summary = $_POST['thread_summary'];
$thread_content = $_POST['thread_content'];
$thread_date = $_POST['thread_date'];
$thread_img = $_POST['thread_img'];
$thread_userID = $_POST['thread_by'];


try{
    $conn = ConnectToDB();

    $stmt = $conn->prepare("INSERT INTO Threads (thread_topic, thread_summary, thread_content, thread_date, thread_img, user_id)
                            VALUES('".$thread_topic."','".$thread_summary."','".$thread_content."','".$thread_date."','".$thread_img."','".$thread_userID."')");
    $stmt->execute();
    echo $thread_date;

    header('location: front_page.php', true, 301);
}
catch (PDOException $e){
    echo $e->getMessage();
};







/*
$stmt = $conn->prepare("SELECT * FROM posts WHERE post_topic");
echo '<div class="thread">
        <li><form method="POST" action="luo_aihe.php">
                <p class="thread_topic" placeholder="">Thread topic</p></li>
                <img class="thread_image"></img>
                <p class="thread_summary">Summary</p>
                <br>
                <p class="timestamp"> 12/22/2021 by Joonas</p>
            </form>
            <hr>
        </li>
    </div>';
*/
?>