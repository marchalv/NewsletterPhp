<?php
include 'conn.php';
session_start();

// Vérification de la connexion
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $sql = "INSERT INTO inscription (email)
    VALUES ('$email')";

    if ($conn->query($sql) === TRUE) {
        header("Location: inscription.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>