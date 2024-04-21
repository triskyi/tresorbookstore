<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Logout logic
if (isset($_GET['logout'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: rgb(34, 114, 232);
            background: linear-gradient(90deg, rgb(16, 20, 26) 0%, rgb(31, 46, 143) 100%, rgba(0, 115, 255, 1) 100%);

        }

        .container {
            display: flex;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #333;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
        }

        .main-content {
            flex: 1;
            padding-left: 250px;
            /* Added padding to avoid sidebar overlap */
        }

        .navbar {
            background-color: #555;
            color: #fff;
            padding: 10px 20px;
            box-sizing: border-box;
            position: fixed;
            top: 0;
            width: 100%;
        }

        .content {
            background-color: #f5f5f5;
            padding: 20px;
            padding-top: 60px;
            /* Adjusted padding to accommodate the fixed navbar */
            height: 100vh;
            box-sizing: border-box;
        }

        .content h1 {
            margin-top: 0;
        }

        .sidebar h2 {
            padding: 20px;
            margin: 0;
            border-bottom: 1px solid #666;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 20px 0;
        }

        .sidebar ul li {
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .sidebar ul li:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <h2>Dashboard</h2>
            <ul>
                <li>Home</li>
                <li>Profile</li>
                <li>Settings</li>
                <li><a href="profile.php">profile</a></li>

                <li><a href="?logout=true">Logout</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="navbar">
                <ul>
                    <li><a href="me"></a></li>
                    <li><a href="me"></a></li>
                    <li><a href="me"></a></li>
                    <li><a href="me"></a></li>
                </ul>
            </div>
            <div class="content">
                <h1>Welcome to the Dashboard</h1>
                <p>This is the main content area of the dashboard. You can put your content here.</p>
            </div>
        </div>
    </div>
</body>

</html>