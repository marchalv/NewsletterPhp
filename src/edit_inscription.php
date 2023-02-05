<?php
include 'conn.php';
session_start();

// Check connection
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Retrieve ID from URL
$id = $_GET['id'];

// Retrieve current email from database
$sql = "SELECT email FROM inscription WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$email = $row['email'];

if (isset($_POST['update'])) {
    $new_email = $_POST['email'];

    $sql = "UPDATE inscription SET email='$new_email' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: inscription.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>

<html>
<head>
    <title>Edit Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Edit Inscription</h1>

<form action="" method="post">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?php echo $email; ?>">
    <input type="submit" value="Update" name="update">
</form>

<form action="inscription.php">
    <button type="submit">Back</button>
</form>

</body>
</html>
