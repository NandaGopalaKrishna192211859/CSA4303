<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'apollo_hospital');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $amount = $_POST['amount'];

    $stmt = $conn->prepare("INSERT INTO donations (name, amount) VALUES (?, ?)");
    $stmt->bind_param("sd", $name, $amount);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
header("Location: view_users.php");
exit();
?>