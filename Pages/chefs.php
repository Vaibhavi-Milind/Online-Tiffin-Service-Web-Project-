<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet Our Chefs</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
            background-image: url('mexican-food.jpg'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            background-color: rgba(0, 0, 0, 0.2); /* Black overlay */
            z-index: -1; /* Send it behind the content */
        }

        /* Header */
        .header {
            background-color: #FFC107;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            color: #333;
        }

        .logo span {
            color: #4CAF50;
        }

        .nav-links {
            list-style-type: none;
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        /* Title */
        .title {
            text-align: center;
            margin-top: 20px;
            font-size: 28px;
            color: #ffffff;
        }

        .description {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: #ffffff;
            margin-top: 10px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            margin-bottom: 20px;
        }

        /* Chef Cards */
        .chefs {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .chef-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            width: 220px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .chef-card img {
            width: 100%;
            border-radius: 5px;
        }

        .chef-name {
            font-weight: bold;
            margin-top: 10px;
            color: #333;
        }

        .chef-description {
            font-size: 14px;
            color: #666;
            margin: 10px 0;
        }

        .chef-info {
            font-size: 14px;
            color: #444;
            margin: 10px 0;
            font-style: italic;
        }

        .order-button {
            background-color: #FFD700;
            color: #333;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .chefs {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>

</head>
<body>

<header class="header">
    <h1 class="logo">DAABAA<span>Xpress</span></h1>
    <nav>
        <ul class="nav-links">
            <li><a href="home.php">Back To Home</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
    </nav>
</header>

<h1 class="title">Meet Our Chefs</h1>
<p class="description">By reading the description of each chef, you can start your tiffin service and pay the price accordingly.</p>

<div class="chefs">
    <?php
    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "tiffin_service_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM chefs";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='chef-card'>";
            echo "<img src='" . $row['image_path'] . "' alt='Chef Image'>";
            echo "<p class='chef-name'>" . $row['name'] . "</p>";
            echo "<p class='chef-description'>" . $row['description'] . "</p>";
            echo "<p class='chef-info'><strong>Price per Thali:</strong> ₹" . $row['price_per_thali'] . "<br>";
            echo "<strong>Monthly:</strong> ₹" . $row['price_monthly'] . "</p>";
            echo "<p class='chef-info'><strong>Address:</strong> " . $row['address'] . "<br>";
            echo "<strong>Phone:</strong> " . $row['phone'] . "</p>";
            echo "<button class='order-button' onclick='navigateToOrderPage()'>Order</button>";
            echo "</div>";
        }
    } else {
        echo "No chefs available.";
    }

    $conn->close();
    ?>
</div>

<script>
    function navigateToOrderPage() {
        window.location.href = 'meal_plan.html';
    }
</script>

</body>
</html>
