<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "subjects";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "No user found with that username.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Basic Styling */
body, html {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    background-color: #F0F4F8; /* Zelfde achtergrondkleur als dashboard */
    color: #333;
    box-sizing: border-box;
}

/* Header */
header {
    background-color: #ffffff;
    padding: 20px 40px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    text-align: center;
}

header h1 {
    margin: 0;
    font-size: 24px;
}

/* Main Content */
main {
   height: 100px;
   width: 100px;
    max-width: 400px; /* Beperk de breedte van de loginpagina */
    margin: 100px auto; /* Centreer de pagina */
    background-color: #FFFFFF;
    border-radius: 12px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.05);
}

/* Form Styling */
form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

form input {
    padding: 10px;
    border: 1px solid #d1d1d1;
    border-radius: 5px;
}

form button {
    padding: 10px;
    background-color: #8F88FD; /* Zelfde kleur als dashboard */
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

form button:hover {
    background-color: #6b5eea; /* Donkerdere tint voor hover */
}

/* Footer Styling */
footer {
    background-color: #f1f1f1;
    padding: 20px 0;
    text-align: center;
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
}

footer p {
    margin: 0;
    color: #333;
}
    </style>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error_message)) { echo "<p style='color:red;'>$error_message</p>"; } ?>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <!-- <a href="register.php">register??</a> -->
</body>
</html>