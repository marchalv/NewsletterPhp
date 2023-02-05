<?php
include 'conn.php';

$id = $_GET['id'];
$label = $_GET['label'];

// Deleting the theme from the database
$sql = "DELETE FROM theme_inscription WHERE inscription_id = '$id' AND theme_id = (SELECT id FROM theme WHERE label = '$label')";
$result = $conn->query($sql);

// Redirecting back to the themes page
header("Location: themesList.php");
exit();

