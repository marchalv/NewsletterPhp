<?php
session_start();

// Destroying the session
session_destroy();

// Redirecting the user to the home page
header("Location: home.php");
exit();

?>