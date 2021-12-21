<?php
session_start();
require_once("auth.php");
tarkistaEttäOnKirjautunut();

?>

<html>
<head>
	<meta charset="UTF-8">
    
    <link rel="stylesheet" href="app.css">
</head>
<body>

<?php
    echo "<a href='lemmikit.php'>Takaisin listaan</a>";


    require_once("database.php");
?>
<h1>Lemmikin tiedot</h1>

<?php

try {
    // Muodostetaan yhteys tietokantaan
    $conn = avaaTietokantaYhteys();

    $stmt = $conn->prepare("SELECT * from pets WHERE id=". $_GET["id"]);
    $stmt->execute();

    $data = $stmt->fetchAll(); // array[][] - taulukko

    $dt = new DateTime($data[0]["birthday"]);
	
	echo "<p>Nimi: " . $data[0]["name"] . "</p>";
	echo "<p>Tyyppi: " . $data[0]["type"] . "</p>";
	echo "<p>Syntymäpäivä: " . $dt->format("d.m.Y") . "</p>";

    switch($data[0]["status"])
    {
        case "alive": echo "<p>Status: Elossa</p>"; break;
        case "dead": echo "<p>Status: Kuollut</p>"; break;
        default: echo "<p>Status: Tuntematon</p>"; break;
    }
	
}
catch(PDOException $e) {
    echo $e->getMessage();
}


?>


<h2>Eläinlääkärikäynnit</h2>
<table>
    <tr>
        <th>Ajankohta</th>
        <th>Käynnin syy</th>
    </tr>
<?php

try {
    // Muodostetaan yhteys tietokantaan
    $conn = avaaTietokantaYhteys();

    $stmt = $conn->prepare("SELECT * from vet_visits WHERE pet_id=". $_GET["id"]);
    $stmt->execute();

    $data = $stmt->fetchAll(); // array[][] - taulukko
	
	foreach($data as $row) {
        $dt = new DateTime($row["datetime"]);
        echo "<tr><td>" . $dt->format("d.m.Y H:i") . "</td><td>" . $row["reason"] . "</td></tr>";
		//echo "<p>Päivämäärä: " .  . "</p>";
		//echo "<p>Käynnin syy: " . $row["reason"] . "</p>";
	}
}
catch(PDOException $e) {
    echo $e->getMessage();
}


?>
</table>

<?php
    echo "<p><a href='lisaa_kaynti.php?pet_id=" . $_GET["id"] . "'>Lisää käynti</a></p>";
?>

</body>
</html>