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
        $thread = $stmt_thread->fetchAll(PDO::FETCH_ASSOC);

        $stmt_comments = $conn->prepare("SELECT Comments.*, Users.user_firstname, Users.user_lastname, Threads.thread_ID
                                        FROM ((Comments
                                        INNER JOIN Users ON Comments.user_id = Users.user_id)
                                        INNER JOIN Threads ON Comments.thread_ID = Threads.thread_ID)
                                        WHERE Comments.thread_ID = ".$thread_index."");
        $stmt_comments->execute();
        $comment = $stmt_comments->fetchAll(PDO::FETCH_ASSOC);
    
        usort($comment, function($a, $b) {
            $datetime1 = strtotime($a['comment_date']);
            $datetime2 = strtotime($b['comment_date']);
            return $datetime1 - $datetime2;
        });
        print_r($comment);
        print_r($_SERVER['REQUEST_URI']);
    }
    catch(PDOException $e){
        $e->getMessage();
    };
?>