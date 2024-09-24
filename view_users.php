<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'apollo_hospital');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve registered users
$user_query = "SELECT username, email, phone FROM users";
$user_result = $conn->query($user_query);

// Retrieve donations
$donation_query = "SELECT name, amount FROM donations";
$donation_result = $conn->query($donation_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users and Donations - Apollo Hospital</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .logout {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #fff;
            color: #980202;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            transition: background 0.3s;
        }
        .logout:hover {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <header>
        <h1>Registered Users and Donations</h1>
        <a href="logout.php" class="logout">Logout</a>
    </header>
    <section>
        <h2>Registered Users</h2>
        <ul>
            <?php
            if ($user_result->num_rows > 0) {
                while ($row = $user_result->fetch_assoc()) {
                    echo "<li>Username: " . $row["username"] . ", Email: " . $row["email"] . ", Phone: " . $row["phone"] . "</li>";
                }
            } else {
                echo "<li>No users registered yet.</li>";
            }
            ?>
        </ul>
    </section>
    <section>
        <h2>Donations</h2>
        <ul>
            <?php
            if ($donation_result->num_rows > 0) {
                while ($row = $donation_result->fetch_assoc()) {
                    echo "<li>Name: " . $row["name"] . ", Amount: $" . $row["amount"] . "</li>";
                }
            } else {
                echo "<li>No donations received yet.</li>";
            }
            ?>
        </ul>
    </section>
    <footer>
        <p>&copy; 2024 Apollo Hospital. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
