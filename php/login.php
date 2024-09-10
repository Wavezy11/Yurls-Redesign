<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <header>
        <div class="header-content">
            <h1>Login</h1>
        </div>
    </header>

    <main>
    <form method="POST" action="login_process.php">
    <input type="email" name="email" required placeholder="Email">
    <input type="password" name="password" required placeholder="Password">
    <button type="submit">Login</button>
</form>
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </main>
</body>
</html>
