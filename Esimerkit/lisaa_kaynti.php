<?php
session_start();
require_once("auth.php");
tarkistaEttäOnKirjautunut();

?>

<html>	
	<head>
        <link rel="stylesheet" href="app.css">
        <title>Lisää eläinlääkärikäynti</title>
    </head>
<body>
<!-- Tällä sivulla pyydetään käyttäjältä käynnin tiedot -->
<h1>Lisää eläinlääkärikäynti</h1>

<form method="POST" action="luo_kaynti.php">
	<p><input type="date" name="date" placeholder="Käynnin pvm" required></p>
	<p><input type="time" name="time" placeholder="Kellonaika" required></p>
	<p><input type="text" name="reason" placeholder="Käynnin syy" required></p>
	
	<!-- Lisätään lemmikin ID-numero piilotettuun (hidden) kenttään -->
	<input type="text" name="petId" value="<?php echo $_GET["pet_id"]; ?>" hidden>
	
	<p><input type="submit" value="Lisää"></p>

</form>


</body>
</html>