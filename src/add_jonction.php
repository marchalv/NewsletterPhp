<?php
include 'conn.php';

$id = $_GET['id'];
$label = $_GET['label'];

$sql = "INSERT INTO theme_inscription (inscription_id, theme_id)
VALUES ('$id', (SELECT id FROM theme WHERE label = '$label'))";
$result = $conn->query($sql);

// Redirecting back to the themes page
header("Location: themesList.php");
exit();

