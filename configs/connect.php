<?php
session_start();

// Database connection
$host = 'localhost';
$user = 'root';
$password = ''; // Set your MySQL root password here
$dbname = 'class';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Signup process
if (isset($_POST['register'])) {
    $fullName = $conn->real_escape_string($_POST['full_name']);
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_BCRYPT);
    $gender = $conn->real_escape_string($_POST['gender']);

    // Handle profile picture upload
    $profilePicture = NULL;
    if (!empty($_FILES['profile_picture']['name'])) {
        // Directory to save uploaded files
        $targetDir = "uploads/";
        // Ensure the uploads directory exists
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        // Generate a unique name for the file to prevent overwriting
        $fileName = uniqid() . '_' . basename($_FILES['profile_picture']['name']);
        $profilePicture = $targetDir . $fileName;
        // Move uploaded file to target directory
        if (!move_uploaded_file($_FILES['profile_picture']['tmp_name'], $profilePicture)) {
            die('Error uploading profile picture.');
        }
    }

    // Insert data into users table
    $sql = "INSERT INTO users (full_name, username, email, phone, password, gender, profile_picture) 
            VALUES ('$fullName', '$username', '$email', '$phone', '$password', '$gender', '$profilePicture')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: login.php"); // Redirect to login after successful registration
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Login process
if (isset($_POST['login'])) {
    $usernameOrEmail = $conn->real_escape_string($_POST['username_or_email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Check if the user exists
    $sql = "SELECT * FROM users WHERE username='$usernameOrEmail' OR email='$usernameOrEmail'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to the dashboard
            header("Location: /dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}

$conn->close();
?>