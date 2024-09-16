<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

// Variable to hold error message
$error_msg = "";

// Define lockout durations
$lockout_times = [300, 900, 3600]; // 5 minutes, 15 minutes, 1 hour

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the POST request
    $username = $_POST['username'];
    $password_input = $_POST['password'];

    // Prepare the SQL statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();

    if ($user_data) {
        // Check if the user is locked out
        if (!is_null($user_data['lockout_until']) && strtotime($user_data['lockout_until']) > time()) {
            // User is still locked out
            $time_left = strtotime($user_data['lockout_until']) - time();
            $minutes_left = round($time_left / 60);
            $error_msg = "Your account is locked. Try again in $minutes_left minutes.";
        } else {
            // Check password
            if (password_verify($password_input, $user_data['password'])) {
                // Successful login, reset failed attempts and lockout
                $sql = "UPDATE users SET failed_attempts = 0, lockout_until = NULL WHERE username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $username);
                $stmt->execute();

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
                // Invalid password, increment failed attempts
                $failed_attempts = $user_data['failed_attempts'] + 1;
                $lockout_duration = null;

                // Determine if we should lock the user out
                if ($failed_attempts >= 3) {
                    // Determine the lockout time based on the number of lockouts (1st, 2nd, 3rd)
                    $lockout_time = isset($lockout_times[$failed_attempts - 3]) ? $lockout_times[$failed_attempts - 3] : $lockout_times[2];
                    $lockout_until = time() + $lockout_time;
                    $lockout_duration = date("Y-m-d H:i:s", $lockout_until);
                    $failed_attempts = 3; // Cap the failed attempts at 3 to avoid overflow
                }

                // Update the failed attempts and lockout time in the database
                $sql = "UPDATE users SET failed_attempts = ?, lockout_until = ? WHERE username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iss", $failed_attempts, $lockout_duration, $username);
                $stmt->execute();

                // Show error message
                if ($lockout_duration) {
                    $error_msg = "Too many failed attempts. Your account is locked for " . round($lockout_time / 60) . " minutes.";
                } else {
                    $error_msg = "Invalid username or password. Attempt $failed_attempts of 3.";
                }
            }
        }
    } else {
        // User not found
        $error_msg = "Invalid username or password.";
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <style>
        .error {
            color: red;
            font-size: 1rem;
            position: absolute;
            bottom: 15vh;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <h1>Login</h1>
        </div>
    </header>

    <main>
        <form method="POST" action="">
            <input type="text" name="username" required placeholder="Username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
            <input type="password" name="password" required placeholder="Password">
            <button type="submit">Login</button>
        </form>
        <p id="register">Don't have an account? <a href="register.php">Register</a></p>
        
        <!-- Display error message if login fails -->
        <?php if ($error_msg): ?>
            <p class="error"><?php echo htmlspecialchars($error_msg); ?></p>
        <?php endif; ?>
    </main>
</body>
</html>
