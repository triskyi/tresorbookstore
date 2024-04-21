<?php
session_start();

// Check if user is already logged in, redirect to home page if true
if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myproject"; // Change to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $username_email = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to retrieve user from database
    $stmt = $conn->prepare("SELECT username, password FROM registeration_form WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username_email, $username_email);

    // Execute SQL statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if user exists and password is correct
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Store username in session
            $_SESSION['username'] = $row['username'];

            // Redirect to home page
            header("Location: home.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Invalid username or email.";
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgb(34, 114, 232);
            background: linear-gradient(90deg, rgb(16, 20, 26) 0%, rgb(31, 46, 143) 100%, rgba(0, 115, 255, 1) 100%);
        }

        .login-div {
            max-width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Center horizontally */
        }

        .form-group {
            margin-bottom: 15px;
            width: 100%;
            /* Ensures the input fields take up the full width */
        }

        label {
            display: block;
            margin-bottom: 5px;

            /* Center the labels */
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            /* Ensure padding is included in the width */
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background: linear-gradient(to right, #af4c8c, #4588a0);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: linear-gradient(to right, #1d1219, #887221);
        }

        .links {
            margin-top: 10px;
            text-align: center;
        }

        .links a {
            color: #007bff;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-div">
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Username or Email:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error)) { ?>
            <p><?php echo $error; ?></p>
        <?php } ?>
        <div class="links">
            <a href="/forgot-password">Forgot Password?</a>
            <span> | </span>
            <a href="/register">Register</a>
        </div>
    </div>
</body>


</html>