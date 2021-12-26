<?php

session_start();

date_default_timezone_set('Europe/Helsinki');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tyyli.css">
    <title>Front page</title>

    <script type=module src=scripts.js></script>

</head>
<body>

    <div class="container_front">
        <div class="header">
            <div class="header_title"><a href="#">Tervetuloa Foorumille</a></div>
            <div class="user_info">
                <a href="#"><?php
                    $fname = $_SESSION['fname'];
                    $lname = $_SESSION['lname'];

                    echo $fname." ".$lname."!";
                ?></a>
            </div>
            <div class="header_links">
                <a href="#">Home</a>
                <a href="#">Contacts</a>
                <a href="#">FAQ</a>
            </div>
        </div>



        <ol class="listOf_threads">
            <div class="thread">
                <li><form method="POST" action="luo_aihe.php">
                        <p class="thread_topic" placeholder="">Thread topic</p></li>
                        <p class="thread_summary">Summary</p>
                        <br>
                        <p class="timestamp"> 12/22/2021 by Joonas</p>
                    </form>
                    <hr>
                </li>
            </div>

            <button class="new_thread_button" onclick="newComment()">Luo uusi lanka</button>

            <!--comment box-->
            <div id="new_thread" class="new_thread">
                <li><form method="POST" action="luo_aihe.php">
                        <input name=""class="thread_topic" placeholder="Thread topic"></li>
                        <textarea maxlength="200" class="thread_summary" placeholder="content (max 200 characters)"></textarea>
                        <br>
                        <input class="thread_button" type="submit" value="Post">
                    </form>
                    <hr>
                </li>
            </div>
        </ol>
        <div class="footer">
            <h1>Footer</h1>
        </div>
    </div>
    <script>
        function newComment(){
            var thread = document.getElementById("new_thread");

            if(thread.style.display == 'none'){
                thread.style.display = 'block';
            }
            else{
                thread.style.display = 'none';
            }
        }
    </script>
</body>
</html>