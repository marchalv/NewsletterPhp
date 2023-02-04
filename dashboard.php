<?php
session_start();

// Vérification de la connexion
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Connexion à la base de données
const DB_SERVER = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_DATABASE = 'phpProject';
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Récupération du nombre d'inscrits
$sql = "SELECT COUNT(*) FROM inscription";
$result = $conn->query($sql);
$users_count = $result->fetch_row()[0];

// Récupération du nombre de thèmes
$sql = "SELECT COUNT(*) FROM theme";
$result = $conn->query($sql);
$themes_count = $result->fetch_row()[0];

?>

<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h1>Dashboard</h1>

<p>Number of registered users: <?php echo $users_count; ?></p>
<p>Number of themes: <?php echo $themes_count; ?></p>

<a href="logout.php">Logout</a>

</body>
</html>
