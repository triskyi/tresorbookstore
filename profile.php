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

// Retrieve user data from the database
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM registeration_form WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $phone = $row['phone'];
        $image_data = $row['Image']; // Assuming the image data is stored in a column named 'image'
    } else {
        echo "User not found.";
    }
} else {
    echo "Session data not found.";
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(90deg, rgb(16, 20, 26) 0%, rgb(31, 46, 143) 100%, rgba(0, 115, 255, 1) 100%);
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-info p {
            margin: 10px 0;
            color: #555555;
        }

        .profile-image img {
            max-width: 200px;
            height: auto;
            border-radius: 50%;
            border: 5px solid #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .update-form input[type="text"],
        .update-form input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .update-form input[type="file"] {
            margin-top: 10px;
        }

        .update-form input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 12px 20px;
            cursor: pointer;
        }

        .update-form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-info">
                    <h2>User Profile <i class="fas fa-user"></i></h2>
                    <p><strong>Username:</strong> <?php echo $username; ?></p>
                    <p><strong>Email:</strong> <?php echo $email; ?></p>
                    <p><strong>Phone:</strong> <?php echo $phone; ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="profile-image text-center">
                    <p><strong>Profile Image:</strong></p>
                    <?php
                    if ($image_data) {
                        // Display the profile image if image data is available
                        $image_src = 'data:image/jpeg;base64,' . base64_encode($image_data);
                        echo "<img src='$image_src' alt='Profile Image'>";
                    } else {
                        echo "Profile image not available.";
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="update-form mt-4">
                    <h2>Update Profile <i class="fas fa-edit"></i></h2>
                    <form action="update_profile.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="New Username" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="New Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="New Phone" required>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="image" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>