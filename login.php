<?php
// Connexion à la base de données
const DB_SERVER = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_DATABASE = 'phpProject';
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Vérification de la connexion
if(!$conn) {
    die("La connexion a échoué : " . mysqli_connect_error());
}

// Récupération des données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Préparation de la requête
$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

// Exécution de la requête
$result = mysqli_query($conn, $query);

// Vérification des résultats
if(mysqli_num_rows($result) == 1) {
    // Connexion réussie
    session_start();
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
} else {
    // Connexion échouée
    echo "Nom d'utilisateur ou mot de passe incorrect";
}

// Fermeture de la connexion
mysqli_close($conn);
?>
