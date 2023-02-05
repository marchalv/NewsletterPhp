<?php
include 'conn.php';
session_start();

// Verifying the session
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Checking if the "id" parameter exists in the URL
if (!isset($_GET['username'])) {
    header("Location: admin.php");
    exit();
}

// Retrieving the theme ID from the URL
$username = $_GET['username'];

if ($username === $_SESSION['username']) {
    echo "<script>
    alert('Error: You cannot delete yourself :)');
    window.location.href = 'admin.php';
    </script>"
    ;
    exit();
}else{
    

    // Deleting the theme from the database
    $sql = "DELETE FROM admin WHERE username = '$username'";
    $result = $conn->query($sql);

    // Redirecting back to the themes page
    header("Location: admin.php");
    exit();
}

?>