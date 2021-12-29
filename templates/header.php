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