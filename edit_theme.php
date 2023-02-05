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

// Retrieve current label from database
$sql = "SELECT label FROM theme WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$label = $row['label'];

if (isset($_POST['update'])) {
    $new_label = $_POST['label'];

    $sql = "UPDATE theme SET label='$new_label' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: themes.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>

<html>
<head>
    <title>Edit Label</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Edit Label</h1>

<form action="" method="post">
    <label for="label">Label:</label>
    <input type="text" id="label" name="label" value="<?php echo $label; ?>">
    <input type="submit" value="Update" name="update">
</form>

<form action="themes.php">
    <button type="submit">Back</button>
</form>

</body>
</html>