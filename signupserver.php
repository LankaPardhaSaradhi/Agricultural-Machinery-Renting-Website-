<?php
$conn = new mysqli('localhost', 'Rajesh', 'Rajesh@7674', 'agrogearrental');

if ($conn->connect_error) {
    die('not connected to sql' . $conn->connect_error);
}

if (isset($_POST['signup'])) {
    $Fname = $_POST['Fname'];
   
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Check if passwords match
    if ($password !== $cpassword) {
        echo "<script>alert('Error: Passwords do not match')</script>";
    } else {
        // Check if the combination of first name and last name already exists in the database
        $checkExisting = "SELECT * FROM signupusers WHERE Fname='$Fname'";
        $result = $conn->query($checkExisting);
        if ($result->num_rows > 0) {
            echo "<script>alert('Error:  name already exists')</script>";
        } else {
            // Insert new user if validations pass
            $insert = "INSERT INTO signupusers (Fname, email, password, cpassword) 
                       VALUES ('$Fname', '$email', '$password', '$cpassword')";

            if ($conn->query($insert) === TRUE) {
                echo "<script>alert('Sign up successful')</script>";
            } else {
                echo "<script>alert('Error: " . $conn->error . "')</script>";
            }
        }
    }
}
