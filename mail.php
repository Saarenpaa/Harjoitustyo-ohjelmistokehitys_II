<?php 
session_start();

mail("e2001398@edu.vamk.fi", $_POST['aihe'], $_POST['message'] );

header("location: contacts.php", true, 301);

?>