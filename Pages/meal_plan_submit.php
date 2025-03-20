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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $mealType = $_POST['mealType'];
    $frequency = $_POST['frequency'];
    $delivery = $_POST['delivery'];
    $payment = $_POST['payment'];

    // SQL query to insert the form data into the database
    $sql = "INSERT INTO meal_plans (name, age, address, meal_type, frequency, delivery, payment)
            VALUES ('$name', '$age', '$address', '$mealType', '$frequency', '$delivery', '$payment')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to payment.html after successful insertion
        echo "<script>
                alert('Meal Plan Successfully Submitted');
                window.location.href = 'index.html';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
