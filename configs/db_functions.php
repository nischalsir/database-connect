<?php
session_start();

// Set session timeout duration (in seconds)
$timeout_duration = 600; // 10 minutes

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if the session has timed out
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

// Update last activity time
$_SESSION['last_activity'] = time();

// Database connection
$host = 'localhost';
$user = 'root';
$password = ''; // Set your MySQL root password here
$dbname = 'class';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Fetch logged-in user data
$user_id = $_SESSION['user_id'];
$user_sql = "SELECT full_name, profile_picture FROM users WHERE id = ?";
$stmt = $conn->prepare($user_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_result = $stmt->get_result();
$logged_in_user = $user_result->fetch_assoc();

// Handle form submission for deleting users
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $user_id = $_POST['user_id'] ?? null;
    if ($user_id) {
        $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();

        $_SESSION['notification'] = "User deleted successfully.";

        header("Location: dashboard.php");
        exit();
    }
}
?>