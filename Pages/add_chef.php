<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiffin_service_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price_per_thali = $_POST['price_per_thali'];
    $price_monthly = $_POST['price_monthly'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["upload_image"]["name"]);
    $image_path = $target_file;

    if (move_uploaded_file($_FILES["upload_image"]["tmp_name"], $target_file)) {
        // Prepare the SQL statement
        $sql = "INSERT INTO chefs (name, description, price_per_thali, price_monthly, address, phone, image_path) 
                VALUES ('$name', '$description', '$price_per_thali', '$price_monthly', '$address', '$phone', '$image_path')";

        if ($conn->query($sql) === TRUE) {
            header("Location: admin.html");  // Redirect to admin.html
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading the image.";
    }
}

$conn->close();
?>
