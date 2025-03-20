<?php
// delete_user.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiffin_service_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "User deleted successfully.";
    header("Location: users.php"); // Redirect back to users list
    exit();
} else {
    echo "Error deleting user: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
