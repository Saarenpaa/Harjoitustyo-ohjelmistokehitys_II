<?php
session_start();

require_once("database.php");

$comment_content = $_POST['comment_content'];
$comment_date = date('Y-m-d H:i:s');
$user_id = $_SESSION['userId'];
$thread_ID = $_POST['thread_ID'];


try{
    //muodostetaan yhteys tietokantaan
    $conn = ConnectToDB();
    //valmistellaan kommentin tiedot tietokantaan ja sitten tallennetaan ne
    $stmt = $conn->prepare("INSERT INTO Comments (comment_content, comment_date, user_id, thread_ID)
                            VALUES('".$comment_content."','".$comment_date."','".$user_id."','".$thread_ID."')");
    $stmt->execute();

    //haetaan uusimman kommentin tiedot
    $stmt_latestComment = $conn->prepare ("SELECT comment_ID, comment_date FROM Comments ORDER BY comment_date DESC LIMIT 1");
    $stmt_latestComment->execute();
    
    //uudelleen ohjataan uuden kommentin paikkaan.
    $latestComment = $stmt_latestComment->fetch();
    header("location: thread_page.php?thread_id=".$thread_ID."#".$latestComment[0]."", true, 301);
}
catch (PDOException $e){
    echo $e->getMessage();
};

?>