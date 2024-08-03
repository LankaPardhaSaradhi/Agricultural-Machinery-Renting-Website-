<?php
// Start session to access session variables
session_start();

// Check if user is logged in, if not, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

// Display user's profile information
echo "<h1>Welcome " . $_SESSION['Fname'] . "</h1>";
echo "<p>Email: " . $_SESSION['email'] . "</p>";

// You can display other profile information here
