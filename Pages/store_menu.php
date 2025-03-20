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
    $price = $_POST['price'];

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["upload-image"]["name"]);
    $image_path = $target_file;

    // Check if the file was successfully uploaded
    if (move_uploaded_file($_FILES["upload-image"]["tmp_name"], $target_file)) {
        // Prepare the SQL statement to insert data
        $sql = "INSERT INTO menu (name, price, image_path) 
                VALUES ('$name', '$price', '$image_path')";

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
