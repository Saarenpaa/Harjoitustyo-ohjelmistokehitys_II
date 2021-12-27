<?php

require_once('database.php');

$post_topic = $_POST['thread_topic'];
$post_summary = $_POST['thread_summary'];
$post_content = $_POST['thread_content'];
$post_date = $_POST['thread_date'];
$post_img = $_POST['thread_img'];
$post_userID = $_POST['thread_by'];


try{
    $conn = ConnectToDB();

    $stmt = $conn->prepare("INSERT INTO posts (post_content, post_date, post_topic, post_by)
    VALUES()");

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