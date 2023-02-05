<?php

session_start();
$email = $_SESSION['email'];
?>

<html>
<head>
    <title>Themes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>



<?php
include 'conn.php';

// Recuperer id de l'email
$sql = "SELECT id FROM inscription WHERE email = '$email'";
$result = $conn->query($sql);
$id = $result->fetch_row()[0];
$_SESSION['id'] = $id;

echo "<h1>Thèmes de $email </h1>";

// Recuperer les themes selectionnes
$sql = "SELECT theme.label FROM theme INNER JOIN theme_inscription ON theme_inscription.theme_id = theme.id WHERE theme_inscription.inscription_id = '$id'";
$result = $conn->query($sql);

echo "<table border='1'>";
echo "<tr>";
echo "<th>Thèmes selectionnés</th>";
echo "<th></th>";
echo "</tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["label"] . "</td>";
    echo "<td><a href='delete_jonction.php?id=" . $id . "&label=" . $row["label"] . "'>Se desinscire</a></td>";
    echo "</tr>";
}
echo "</table>";
echo "<br>";
// Recuperer les themes non selectionnes
$sql = "SELECT theme.label FROM theme WHERE theme.id NOT IN (SELECT theme_inscription.theme_id FROM theme_inscription WHERE theme_inscription.inscription_id = '$id')";
$result = $conn->query($sql);
echo "<table border='1'>";
echo "<tr>";
echo "<th>Thèmes non selectionnés</th>";
echo "<th></th>";
echo "</tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["label"] . "</td>";
    echo "<td><a href='add_jonction.php?id=" . $id . "&label=" . $row["label"] . "'>S'inscire</a></td>";
    echo "</tr>";
}
echo "</table>";
?>

<br>
<div class="container-row">
    <form class="button" action="logout.php">
        <button type="submit">Log out</button>
    </form>
</div>
