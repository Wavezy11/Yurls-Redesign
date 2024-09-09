<?php
session_start();
require 'PHPMailer/PHPMailerAutoload.php'; // Make sure you have PHPMailer included

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pit";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();

    if ($user_data && password_verify($pass, $user_data['password'])) {
        if ($user_data['verified'] == 0) {
            $twofa_code = rand(100000, 999999);
            $update_sql = "UPDATE users SET twofa_code = ? WHERE email = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("ss", $twofa_code, $email);
            $update_stmt->execute();

            // Send email with 2FA code
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp-mail.outlook.com'; // Use your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'halamadriddd231@outlook.com'; // Your email
            $mail->Password = 'Viscabarca15'; // Your email password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('Halamadriddd231@outlook.com', 'hala madrid');
            $mail->addAddress($email);
            $mail->Subject = 'Your 2FA Code';
            $mail->Body    = "Your 2FA code is: $twofa_code\n\nPlease enter this code to complete your login.";
            $mail->isHTML(true);
            $mail->send();

            $_SESSION['email'] = $email;
            header("Location: verify_2fa.php");
        } else {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user_data['username'];
            header("Location: index.php");
        }
    } else {
        echo "Invalid email or password";
    }
}
?>
