<?php
session_start();

// Establish a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$database = "myproject";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone = $_POST['phone'];

    // Check if file is uploaded successfully
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Get image data
        $image_data = file_get_contents($_FILES['image']['tmp_name']);

        // Escape special characters to prevent SQL injection
        $image_data = $conn->real_escape_string($image_data);

        // Validate form data
        if (empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($phone)) {
            echo "All fields are required.";
        } elseif ($password !== $confirm_password) {
            echo "Passwords do not match.";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data into the database
            $sql = "INSERT INTO registeration_form (username, email, password, phone, image) 
                    VALUES ('$username', '$email', '$hashed_password', '$phone', '$image_data')";

            if ($conn->query($sql) === TRUE) {
                // Redirect to login page
                header("Location: login.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                logError("Database error: " . $conn->error);
            }
        }
    } else {
        echo "Error uploading image.";
    }
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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

        .register-div {
            max-width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
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
    <div class="register-div">
        <h2>Register</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
            enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" name="image" />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password"
                    required>
            </div>

            <button type="submit">Register</button>
        </form>
        <div class="links">
            <a href="/login">Already have an account? Login</a>
        </div>
    </div>

</body>

</html>