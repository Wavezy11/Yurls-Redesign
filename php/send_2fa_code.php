<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Zorg ervoor dat je autoload bestand correct is

function send2FACode($userEmail, $userName, $code) {
    $mail = new PHPMailer(true);

    try {
        // Server instellingen
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Je SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@example.com'; // Je SMTP gebruikersnaam
        $mail->Password = 'your-email-password'; // Je SMTP wachtwoord
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Ontvangers
        $mail->setFrom('no-reply@example.com', 'Your Website');
        $mail->addAddress($userEmail, $userName);

        // Onderwerp
        $mail->Subject = 'Your 2FA Code';

        // HTML Body
        $mail->isHTML(true);
        $mail->Body = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your 2FA Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 1.5rem;
            color: #005F99;
        }
        p {
            font-size: 1rem;
            margin-bottom: 10px;
        }
        .code {
            display: block;
            margin: 20px 0;
            font-size: 1.5rem;
            font-weight: bold;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .footer {
            font-size: 0.9rem;
            color: #777;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Two-Factor Authentication Code</h1>
        <p>Hello ' . htmlspecialchars($userName) . ',</p>
        <p>Your 2FA code is:</p>
        <div class="code">' . htmlspecialchars($code) . '</div>
        <p>Please enter this code on the website to complete your login.</p>
        <p>If you did not request this code, please ignore this email.</p>
        <div class="footer">
            <p>Best regards,</p>
            <p>Your Website Team</p>
        </div>
    </div>
</body>
</html>
        ';

        // Verzenden
        $mail->send();
        echo 'The 2FA code has been sent.';
    } catch (Exception $e) {
        echo 'The 2FA code could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
