<?php
require_once("aut.php");
tarkistaUserId();

?>
<div class="header">
    <div class="header_title"><a href="front_page.php">Tervetuloa Foorumille</a></div>
    <div class="user_info">
        <a href="user.php"><?php
            $fname = $_SESSION['fname'];
            $lname = $_SESSION['lname'];

            echo $fname." ".$lname."!";
        ?></a>
        
    </div>
    
    <form method="POST" action="kirjaudu_ulos.php" class="logout_div">
            <button type="submit" class="logout">Kirjaudu ulos</button>
    </form>
    <div class="header_links">
        <a href="front_page.php">Home</a>
        <a href="contacts.php">Contacts</a>
        <a href="faq.php">FAQ</a>
    </div>
</div>