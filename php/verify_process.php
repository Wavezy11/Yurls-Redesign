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
    $twofa_code = $_POST['twofa_code'];
    $email = $_SESSION['email'];

    $sql = "SELECT * FROM users WHERE email = ? AND twofa_code = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $twofa_code);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();

    if ($user_data) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user_data['username'];

        // Clear 2FA code
        $update_sql = "UPDATE users SET twofa_code = NULL, verified = 1 WHERE email = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("s", $email);
        $update_stmt->execute();

        header("Location: index.php");
    } else {
        echo "Invalid 2FA code";
    }
}
?>
