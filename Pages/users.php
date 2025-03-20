<?php
// users.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiffin_service_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch users
$sql = "SELECT id, username, email, age, phone FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        table {
            width: 80%;
            margin: 2rem auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #D9534F;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .delete-btn {
            color: white;
            background-color: #D9534F;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">User List</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Age</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['phone']}</td>
                    <td><button class='delete-btn' onclick='deleteUser({$row['id']})'>Delete</button></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No users found</td></tr>";
    }
    $conn->close();
    ?>
</table>

<script>
function deleteUser(id) {
    if (confirm("Are you sure you want to delete this user?")) {
        window.location.href = "delete_user.php?id=" + id;
    }
}
</script>

</body>
</html>
