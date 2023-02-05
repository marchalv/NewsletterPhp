<?php
include 'conn.php';
session_start();

// Vérification de la connexion
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Retrieve data from the table
$sql = "SELECT id, label FROM theme";
$result = $conn->query($sql);
?>

<html>
<head>
    <title>Theme</title>
    <link rel="stylesheet"href="style.css">
</head>
<body>

<h1>Theme</h1>


<?php 
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Label</th>";
    echo "<th></th>";
    echo "<th></th>";
    echo "</tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["label"] . "</td>";
        echo "<td><a href='delete_theme.php?id=" . $row["id"] . "'>Delete</a></td>";
        echo "<td><a class='edit' href='edit_theme.php?id=" . $row["id"] . "&label=" . $row["label"] . "'>Edit</a></td>";
        echo "</tr>";
    }
    echo "</table>";
?>
<br>

<form action="add_theme.php" method="post">
    <label for="label">Nouvelle Theme:</label>
    <input type="text" placeholder="Ajouter une nouvelle theme" id="label" name="label">
    <input type="submit" value="Add">
</form>

<form class="button" action="dashboard.php">
    <button type="submit">Back</button>
</form>

</body>
</html>