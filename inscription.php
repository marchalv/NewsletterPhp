<?php
include 'conn.php';
session_start();

// Vérification de la connexion
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Retrieve data from the table
$sql = "SELECT id, email FROM inscription";
$result = $conn->query($sql);
?>

<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet"href="style.css">
</head>
<body>

<h1>Inscription</h1>


<?php 
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Email</th>";
    echo "<th></th>";
    echo "</tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td><a href='delete_inscription.php?id=" . $row["id"] . "'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
?>
<br>

<form action="add_inscription.php" method="post">
    <label for="email">Nouveau Inscrit:</label>
    <input type="email" placeholder="Ajouter un inscrit" id="email" name="email" required>
    <input type="submit" value="Add">
</form>

<form class="button" action="dashboard.php">
    <button type="submit">Back</button>
</form>

</body>
</html>