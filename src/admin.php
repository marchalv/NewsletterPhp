<?php
include 'conn.php';

$sql = "SELECT * FROM admin";
$result = $conn->query($sql);

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Check if the username already exists
    $username = $_POST['username'];
    $sql = "SELECT * FROM admin WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User with the same username already exists
        echo "<script>
        alert('Error: Admin with username $username already exists.');
        window.location.href = 'admin.php';
        </script>";
        exit();
    } else {
        // Insert the new admin
        $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
    
        if ($conn->query($sql) === TRUE) {
            echo "<script>
            alert('Admin added successfully');
            window.location.href = 'admin.php';
            </script>";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    


    header("Location: admin.php");
    exit();
}
?>

<html>
<head>
    <title>Add Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Add Admin</h1>

<?php 
echo "<table>";
echo "<tr>";
echo "<th>Username</th>";
echo "<th>Action</th>";
echo "</tr>";
while ($row = $result->fetch_assoc()): 
    echo "<tr>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td><a class='delete' href='delete_admin.php?username=" . $row['username'] . "'>Delete</a></td>";
    echo "</tr>";
endwhile; 
echo "</table>";
?>

<br>

<form action="admin.php" method="post">
    <label for="username">Username:</label>
    <input type="text" placeholder="Enter username" id="username" name="username">
    <br><br>
    <label for="password">Password:</label>
    <input type="password" placeholder="Enter password" id="password" name="password">
    <br><br>
    <input type="submit" value="Add" name="submit">
</form>

<form action="dashboard.php">
    <button type="submit">Back</button>
</form>

</body>
</html>
