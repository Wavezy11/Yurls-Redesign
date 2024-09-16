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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <style>
   #succes {
  
   }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <h1>Welkom</h1>
        </div>
    </header>

    <main>
    <div id="succes">
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['password'];

    // Hash password
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, username, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $username, $hashed_password);
    if ($stmt->execute()) {
        echo "Registration successful! You can now <a href='login.php'>login</a>.";
    } else {
        echo "Error: " . $stmt->error;
    }
}

?>
</div>
    </main>
</body>
</html>
