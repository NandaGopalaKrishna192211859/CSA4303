<?php
// Default admin credentials
$default_username = 'admin';
$default_password = 'admin123';  // Set the default password here

session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the entered credentials match the default admin credentials
    if ($username === $default_username && $password === $default_password) {
        $_SESSION['admin_logged_in'] = true; // Set session to mark admin as logged in
        header('Location: admin_dashboard.php'); // Redirect to admin dashboard after successful login
        exit();
    } else {
        $error_message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Apollo Hospital</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form class="login-form" action="admin_login.php" method="post">
        <h2>Admin Login</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Submit</button>

        <?php if (isset($error_message)): ?>
            <div class="error"><?= $error_message ?></div>
        <?php endif; ?>
    </form>
</body>
</html>
