<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Apollo Hospital</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 0 20px;
            padding-top: 100px; /* Offset for the fixed header */
        }
        header {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 20px;
            background: #980202;
            color: white;
            text-align: center;
            z-index: 1000;
        }
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
        section {
            text-align: center;
            padding: 40px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        .dashboard-btn {
            background-color: #980202;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 20px;
        }
        .dashboard-btn:hover {
            background-color: darkred;
        }
        p {
            padding-top: 25px;
            margin-top: 20px;
        }
        footer {
            background: #980202;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome, Admin</h1>
        <a href="logout.php" class="logout">Logout</a>
    </header>

    <section>
        <h2>Admin Dashboard</h2>
        <a href="view_users.php" class="dashboard-btn">View Registered Users</a>
        <p>This page is accessible only to the admin.</p>
    </section>

    <footer>
        <p>&copy; 2024 Apollo Hospital. All rights reserved.</p>
        <p>Admin: NANDA | Apollo Certifications, Registration, Branches</p>
    </footer>
</body>
</html>