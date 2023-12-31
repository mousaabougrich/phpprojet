<?php
session_start();
unset($_SESSION['client_id']); // Unset the user ID
session_destroy(); // Destroy the session
header('Location: loging.php'); // Redirect to the login page
?>
