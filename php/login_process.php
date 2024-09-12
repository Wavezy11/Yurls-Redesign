<?php
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pit";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email and password from the POST request
    $email = $_POST['email'];
    $password_input = $_POST['password'];

    // Prepare the SQL statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();

    // Check if user exists and verify password
    if ($user_data && password_verify($password_input, $user_data['password'])) {
        // Set session variables for logged-in user
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user_data['username'];
        $_SESSION['admin'] = $user_data['admin']; // Store admin status in session

        // Redirect based on admin status
        if ($user_data['admin'] == 1) {
            header("Location: dashboard.php"); // Redirect to dashboard for admins
        } else {
            header("Location: ../index.php"); // Redirect to index page for non-admins
        }
        exit();
    } else {
        // Invalid email or password
        echo "Invalid email or password.";
    }
} else {
    // If not a POST request, redirect or show an error
    echo "Invalid request method.";
}

// Close the connection
$conn->close();
?>
