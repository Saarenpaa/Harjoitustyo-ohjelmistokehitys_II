<?php

    require_once("database.php");

    try{
        $conn = ConnectToDB();

        $filterSelection = $_POST['filter'];
        $order = 'DESC';
        echo $filterSelection;
        if ($filterSelection === 'uusin ensin'){
            $order = 'DESC';
        }
        else{
            $order = 'ASC';
        };
        echo $order;

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
                                        WHERE Comments.thread_ID = ?
                                        ORDER BY Comments.Comment_date ?");
        $stmt_comments->bindParam(1, $thread_index);
        $stmt_comments->bindParam(2, $order);
        $stmt_comments->execute();
        $comment = $stmt_comments->fetchAll();
        var_dump($stmt_comments->fetchAll());
    }
    catch(PDOException $e){
        $e->getMessage();
    };
?>