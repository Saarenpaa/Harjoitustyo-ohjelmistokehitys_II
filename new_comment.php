<?php

require_once("database.php");

$comment_content = $_POST['comment_content'];
$comment_date = $_POST['comment_date'];
$user_id = $_POST['comment_by'];
$thread_ID = $_POST['thread_ID'];


try{
    $conn = ConnectToDB();

    $stmt = $conn->prepare("INSERT INTO Comments (comment_content, comment_date, user_id, thread_ID)
                            VALUES('".$comment_content."','".$comment_date."','".$user_id."','".$thread_ID."')");
    $stmt->execute();

    $stmt_latestComment = $conn->prepare ("SELECT * FROM Comments ORDER BY comment_date DESC LIMIT 1");
    $stmt_latestComment->execute();
    
    $latestComment = $stmt_latestComment->fetch();

    header("location: thread_page.php?thread_id=".$thread_ID."#".$latestComment[0]."", true, 301);
}
catch (PDOException $e){
    echo $e->getMessage();
};

?>