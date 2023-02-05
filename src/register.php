<?php
include 'conn.php';

// Vérification de la connexion
$email = $_POST['email'];
session_start();
$_SESSION['email'] = $email;

$sql = "SELECT * FROM inscription WHERE email = '$email'";
$result = $conn->query($sql);

//Verifier si l'email existe déjà
if ($result->num_rows > 0) {
    header("Location: themesList.php");
    exit();
} else {
    $sql = "INSERT INTO inscription (email)
    VALUES ('$email')";

    if ($conn->query($sql) === TRUE) {
        header("Location: themesList.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
