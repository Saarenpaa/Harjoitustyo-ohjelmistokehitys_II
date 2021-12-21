<?php

session_start();

require_once("auth.php");
tarkistaEttäOnKirjautunut();

require_once("database.php"); // Vastaa C#  using-direktiiviä
require_once("config.php");

?>

<html>
    <head>
        <link rel="stylesheet" href="app.css">
        <title>Lemmikit</title>
    </head>
<body>
<h1>
<?php echo "Hei, " . $_SESSION["userName"] . "!";
?>
</h1>

<p><a href="kirjauduUlos.php">Kirjaudu ulos</a></p>

<?php
    if(isset($_SESSION["success_message"]) === true) {
        echo "<p style='color:green'>" . $_SESSION["success_message"] . "</p>";
    }

    $_SESSION["success_message"] = null;

?>

<h2>Nykyiset lemmikit</h2>

<table>
    <tr>
        <th>Nimi</th>
        <th>Laji</th>
        <th>Syntynyt</th>
        <th>Toimenpiteet</th>
    </tr>
<?php

try {
    // Muodostetaan yhteys tietokantaan
    $conn = avaaTietokantaYhteys();

    $stmt = $conn->prepare(haeOmistajanNykyisetLemmikit($_SESSION["userId"]));
    $stmt->execute();

    $data = $stmt->fetchAll(); // array[][] - taulukko
	
	foreach($data as $row) {
        $dt = new DateTime($row["birthday"]);
        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["type"] . "</td><td>" . $dt->format("d.m.Y") . "</td><td><a href='lemmikki.php?id=" . $row["id"] . "'><img src='eye-solid.svg' style='max-height: 5vh'/></a></td></tr>";
	}
}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>
</table>

<p><a href=" <?php echo "lisaa_lemmikki.php?ownerId=" . $_SESSION["userId"]; ?>">Lisää lemmikki</a></p>


<h2>Entiset lemmikit</h2>
<table>
    <tr>
        <th>Nimi</th>
        <th>Laji</th>
        <th>Syntynyt</th>
        <th>Toimenpiteet</th>
    </tr>
<?php

try {
    // Muodostetaan yhteys tietokantaan
    $conn = avaaTietokantaYhteys();

    $stmt = $conn->prepare(haeOmistajanEntisetLemmikit($_SESSION["userId"]));
    $stmt->execute();

    $data = $stmt->fetchAll(); // array[][] - taulukko
	
	foreach($data as $row) {
        $dt = new DateTime($row["birthday"]);
        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["type"] . "</td><td>" . $dt->format("d.m.Y") . "</td><td><a href='lemmikki.php?id=" . $row["id"] . "'><img src='eye-solid.svg' style='max-height: 5vh'/></a></td></tr>";
    }
}
catch(PDOException $e) {
    echo $e->getMessage();
}

?>
</table>

</body>
</html>