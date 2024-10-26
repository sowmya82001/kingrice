<?php
session_start();
session_destroy(); // Destroy the session

// Redirect to the login page
header("Location: admin_login.php");
exit(); // Ensure the script stops after the redirect
?>
