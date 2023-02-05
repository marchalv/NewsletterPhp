<?php
include 'conn.php';
session_start();

// Verifying the session
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Checking if the "id" parameter exists in the URL
if (!isset($_GET['id'])) {
    header("Location: inscription.php");
    exit();
}

// Retrieving the theme ID from the URL
$id = $_GET['id'];

// Deleting the theme from the database
$sql = "DELETE FROM inscription WHERE id = '$id'";
$result = $conn->query($sql);

// Redirecting back to the themes page
header("Location: inscription.php");
exit();

?>
