<?php
session_start();
require_once("auth.php");
tarkistaEttäOnKirjautunut();

?>

<html>	
	<head>
        <link rel="stylesheet" href="app.css">
        <title>Lisää lemmikki</title>
    </head>
<body>
<!-- Tällä sivulla pyydetään käyttäjältä uuden lemmikin tiedot -->
<h1>Lisää uusi lemmikki</h1>

<form method="POST" action="luo_lemmikki.php">
	<p><input type="text" name="name" placeholder="Lemmikin nimi" required></p>
	<p><input type="text" name="birthday" placeholder="Syntymäpäivä VVVV-KK-PP" required></p>
	<p><select name="type">
		<option value="koira">Koira</option>
		<option value="kissa">Kissa</option>
	</select></p>
	
	<!-- Lisätään omistajan ID-numero piilotettuun (hidden) kenttään -->
	<input type="text" name="ownerId" value="<?php echo $_GET["ownerId"]; ?>" hidden>
	
	<p><input type="submit" value="Luo"></p>

</form>


</body>
</html>