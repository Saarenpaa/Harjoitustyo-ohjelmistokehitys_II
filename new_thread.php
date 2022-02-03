<?php
session_start();


require_once('database.php');

//Kerätään data uudesta threadistä
$thread_topic = $_POST['thread_topic'];
$thread_summary = $_POST['thread_summary'];
$thread_content = $_POST['thread_content'];
$thread_date = date('Y-m-d H:i:s');
$thread_userID = $_SESSION['userId'];


try{
    $conn = ConnectToDB();
    //syötetään data tietokantaan
    $stmt = $conn->prepare("INSERT INTO Threads (thread_topic, thread_summary, thread_content, thread_date, user_id)
                            VALUES('".$thread_topic."','".$thread_summary."','".$thread_content."','".$thread_date."','".$thread_userID."')");
    $stmt->execute();

    $stmt_latestThread = $conn->prepare("SELECT thread_ID, thread_date FROM Threads ORDER BY thread_date DESC LIMIT 1");
    $stmt_latestThread->execute();

    $latestThread = $stmt_latestThread->fetch();
    //Uudelleen ohjataan takaisin
    header("location: front_page.php#".$latestThread[0]."", true, 301);
}
catch (PDOException $e){
    echo $e->getMessage();
};


?>