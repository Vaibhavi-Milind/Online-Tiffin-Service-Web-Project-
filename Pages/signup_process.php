<?php
// signup_process.php

// Your database connection
$servername = "localhost";
$username = "root";
$password = ""; // Default password for XAMPP
$dbname = "tiffin_service_db"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming the data has been validated and sanitized
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$age = $_POST['age'];
$phone = $_POST['phone'];

// Password hashing for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, email, password, age, phone) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssis", $username, $email, $hashed_password, $age, $phone);

if ($stmt->execute()) {
    // Redirect to login page after successful registration
    header("Location: login.html");
    exit(); // Make sure no further code is executed after the redirection
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
