<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";  // Use your database password
$dbname = "tiffin_service_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and decode JSON data from the request
$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'];
$email = $data['email'];
$phone = $data['phone'];
$paymentMethod = $data['paymentMethod'];

// SQL query to insert the details into the database
$sql = "INSERT INTO payments (name, email, phone, payment_method) VALUES ('$name', '$email', '$phone', '$paymentMethod')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $conn->error]);
}

// Close the connection
$conn->close();
?>