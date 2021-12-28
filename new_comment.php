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

    header("location: thread_page.php?thread_id=".$thread_ID."", true, 301);
}
catch (PDOException $e){
    echo $e->getMessage();
};

?>