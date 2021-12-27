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

    <!--<script type=module src=scripts.js></script>-->

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
                <li>
                </li>
            </div>

            <button class="new_thread_button" onclick="newComment()">Luo uusi lanka</button>

            <!--comment box-->
            <div id="new_thread" class="new_thread">
                <li><form method="POST" action="luo_aihe.php">
                            <img title="kuva" class="thread_img" type="image">
                            <input type="file" accept ="image/png, image/jpeg" id="thread_img" name="thread_img"><br>
                            <input name="topic" class="thread_topic" placeholder="Topic">
                            <textarea maxlength="100" class="thread_summary" placeholder="Summary (max 100 characters)"></textarea>
                            <textarea class="thread_content" placeholder="Content"></textarea>
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
            function getStyle(id, name){
                var element = document.getElementById(id);
                return element.currentStyle ? element.currentStyle[name] : window.getComputedStyle ? window.getComputedStyle(element, null).getPropertyValue(name) : null;
            };
            
            var new_thread = document.getElementById('new_thread');
            var display_style = getStyle('new_thread', 'display');

            if(display_style == 'none'){
                new_thread.style.display = 'block';
                setTimeout(new_thread.style.maxHeight = '1500px',1000);
                //new_thread.style.transition = 'max-height 0.25s ease-in';
            }
            else{
                new_thread.style.maxHeight = '0px';
                new_thread.style.display = 'none';
                //new_thread.style.transition = 'max-height 0.15s ease-out';
            };
        };
    </script>
</body>
</html>