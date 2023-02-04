<?php
include 'conn.php';
session_start();

// Vérification de la connexion
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['label'])) {
    $label = $_POST['label'];

    $sql = "INSERT INTO theme (label)
    VALUES ('$label')";

    if ($conn->query($sql) === TRUE) {
        header("Location: themes.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>