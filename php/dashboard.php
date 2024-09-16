<?php
session_start();

// Load environment variables from .env file
require '../../vendor/autoload.php'; // Adjust the number of '../' if necessary
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Database connection parameters from .env file
$servername = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];
$dbname = $_ENV['DB_NAME'];

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Variable to hold error message
$error_msg = "";
$login_attempts = isset($_SESSION['login_attempts']) ? $_SESSION['login_attempts'] : 0;
$lockout_time = isset($_SESSION['lockout_time']) ? $_SESSION['lockout_time'] : 0;

// Check lockout
$current_time = time();
if ($login_attempts >= 3) {
    $time_diff = $current_time - $lockout_time;
    
    if ($login_attempts == 3 && $time_diff < 300) {
        $error_msg = "Account locked. Please try again after 5 minutes.";
    } elseif ($login_attempts == 6 && $time_diff < 900) {
        $error_msg = "Account locked. Please try again after 15 minutes.";
    } elseif ($login_attempts >= 9 && $time_diff < 3600) {
        $error_msg = "Account locked. Please try again after 1 hour.";
    } else {
        // Reset attempts after lockout period ends
        $_SESSION['login_attempts'] = 0;
        $_SESSION['lockout_time'] = 0;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $error_msg == "") {
    // Get username and password from POST request
    $username_input = $_POST['username'];
    $password_input = $_POST['password'];

    // Prepare the SQL statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username_input);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();

    // Check if user exists and verify password
    if ($user_data && password_verify($password_input, $user_data['password'])) {
        // Reset login attempts after a successful login
        $_SESSION['login_attempts'] = 0;
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user_data['username'];
        $_SESSION['admin'] = $user_data['admin'];

        // Redirect based on admin status
        if ($user_data['admin'] == 1) {
            header("Location: dashboard.php"); // Redirect to dashboard for admins
        } else {
            header("Location: ../index.php"); // Redirect to index page for non-admins
        }
        exit();
    } else {
        // Invalid login attempt
        $_SESSION['login_attempts'] = ++$login_attempts;
        $_SESSION['lockout_time'] = time();

        if ($login_attempts >= 3 && $login_attempts < 6) {
            $error_msg = "Invalid login. Your account will be locked for 5 minutes after 3 attempts.";
        } elseif ($login_attempts >= 3 && $login_attempts < 4) {
            $error_msg = "Invalid login. Your account will be locked for 15 minutes after 4 attempts.";
        } elseif ($login_attempts >= 4) {
            $error_msg = "Invalid login. Your account will be locked for 1 hour after 5 attempts.";
        } else {
            $error_msg = "Invalid username or password.";
        }
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
