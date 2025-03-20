<?php
session_start();
$host = 'localhost';
$dbname = 'tiffin_service_db';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userNotFound = false; // Flag to track user existence

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ip_address = $_SERVER['REMOTE_ADDR'];

    // Check if the credentials match the admin account
    if ($username === 'admin' && $email === 'admin@gmail.com' && $password === 'admin123') {
        $_SESSION['user_id'] = 'admin';
        header("Location: admin.html");
        exit();
    }

    // For regular users, proceed with database check
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ? AND email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $status = 'success';
            $_SESSION['user_id'] = $id;
            header("Location: home.php");
            exit();
        } else {
            $status = 'failure';
            echo "<script>alert('Incorrect password.');</script>";
        }

        // Log user attempt
        $log_stmt = $conn->prepare("INSERT INTO log_users (user_id, status, ip_address) VALUES (?, ?, ?)");
        $log_stmt->bind_param("iss", $id, $status, $ip_address);
        $log_stmt->execute();
        $log_stmt->close();
    } else {
        $userNotFound = true;
    }

    $stmt->close();
}

$conn->close();
?>
