<?php
session_start(); // Start session to store user data

$conn = new mysqli('localhost', 'Rajesh', 'Rajesh@7674', 'agrogearrental');

if ($conn->connect_error) {
    die('not connected to sql' . $conn->connect_error);
}

if (isset($_POST['Login'])) {
    $username = $_POST['Fname'];
    $password = $_POST['password'];

    // Query to check if user exists with provided username and password
    $query = "SELECT * FROM signupusers WHERE Fname='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // User found, set session variables and redirect to profile page
        $_SESSION['username'] = $username;
        header('Location: index.html'); // Redirect to profile.php
        exit();
    } else {
        // No user found with provided credentials, display error message
        echo "<script>alert('Invalid username or password')</script>";
    }
}
