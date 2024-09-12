<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pit";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; // Get email from the login form
    $password_input = $_POST['password']; // Get password from the login form
    // Prepare the SQL statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();
    // Check if user exists and verify password
    if ($user_data && password_verify($password_input, $user_data['password'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user_data['username'];
        // Redirect to the index page
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }
}
?>