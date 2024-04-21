<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}

// Establish a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$database = "myproject";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user data from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];
    $new_phone = $_POST['phone'];

    // Check if a file is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Get image data
        $image_data = file_get_contents($_FILES['image']['tmp_name']);

        // Escape special characters to prevent SQL injection
        $image_data = $conn->real_escape_string($image_data);

        // Prepare SQL statement to update user data including image
        $sql = "UPDATE registeration_form SET username = '$new_username', email = '$new_email', phone = '$new_phone', image = '$image_data' WHERE username = '{$_SESSION['username']}'";
    } else {
        // Prepare SQL statement to update user data excluding image
        $sql = "UPDATE registeration_form SET username = '$new_username', email = '$new_email', phone = '$new_phone' WHERE username = '{$_SESSION['username']}'";
    }

    if ($conn->query($sql) === TRUE) {
        // Update session username if it has changed
        $_SESSION['username'] = $new_username;

        // Redirect back to profile page
        header("Location: profile.php");
        exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>